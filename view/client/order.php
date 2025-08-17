<?php
ob_start();
session_start();
include_once __DIR__ . "/../layout/header.php";
include_once __DIR__ . "/../../config/db.php";

// Nếu giỏ hàng trống → quay về cart
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: ../cart.php');
    exit();
}

$database = new Database();
$conn = $database->conn;

$total = 0;
$shipping_fee = 30000;

// Tính tổng tiền
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
$grandTotal = $total + $shipping_fee;

// Khi submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $pttt    = $_POST['pttt'] ?? 'COD';

    // Lưu đơn hàng vào DB
    $stmt = $conn->prepare("INSERT INTO orders (name, phone, address, total_price, shipping_fee, payment_method, status, created_at) VALUES (?, ?, ?, ?, ?, ?, 'pending', NOW())");
    $stmt->bind_param("sssdis", $name, $phone, $address, $grandTotal, $shipping_fee, $pttt);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // Lưu chi tiết đơn hàng
    foreach ($_SESSION['cart'] as $item) {
        $stmtItem = $conn->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmtItem->bind_param("iiid", $order_id, $item['id'], $item['quantity'], $item['price']);
        $stmtItem->execute();
        $stmtItem->close();
    }

    // Nếu VNPay → redirect sang VNPay
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     if ($_POST['pttt'] == 'VNPay') {
        include_once __DIR__ . "/../../config.php";

            $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
            $vnp_Amount = 500 * 100; // Số tiền thanh toán
            $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
            $vnp_BankCode = ''; //Mã phương thức thanh toán
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount * 100,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => "Thanh toan GD: " . $vnp_TxnRef,
                "vnp_OrderType" => "other",
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate" => $expire
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

       ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            //echo $vnp_Url;exit;
            header('Location: ' . $vnp_Url);
            ob_end_flush();
            //exit();
        } else {
            header("Location: order-success.php");
            exit;
        }
    }
}

?>

<div class="order-container">
    <h2>Thông tin đơn hàng</h2>

    <!-- Danh sách sản phẩm trong giỏ hàng -->
    <div class="order-products">
        <h3>Sản phẩm:</h3>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $item): 
                    $image = $item['image'] ?? 'no-image.jpg';
                    $name = $item['name'] ?? 'Sản phẩm không tên';
                    $price = $item['price'] ?? 0;
                    $quantity = $item['quantity'] ?? 1;
                    $subtotal = $price * $quantity;
                ?>
                <tr>
                    <td><img src="../<?php echo htmlspecialchars($image); ?>" width="50" alt="<?php echo htmlspecialchars($name); ?>"></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo number_format($price); ?> VNĐ</td>
                    <td><?php echo number_format($subtotal); ?> VNĐ</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Form nhập thông tin khách hàng -->
    <form action="" method="POST">
        <div>
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div>
            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" required>
        </div>

        <div>
            <p>Phí vận chuyển: <?php echo number_format($shipping_fee); ?> VNĐ</p>
            <p><strong>Tổng tiền: <?php echo number_format($grandTotal); ?> VNĐ</strong></p>
            <p>Phương thức thanh toán:</p>
            <input type="radio" name="pttt" value="COD" checked> Tiền mặt <br>
            <input type="radio" name="pttt" value="VNPay"> VNPay
        </div>

        <button type="submit" class="btn btn-primary">Đặt hàng</button>
    </form>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
