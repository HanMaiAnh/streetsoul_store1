<?php
session_start();
require_once __DIR__ . '/../../config/db.php';

// Kết nối CSDL
$database = new Database();
$conn = $database->conn;

// Nếu chưa đăng nhập thì không cho đặt hàng
if (!isset($_SESSION['user'])) {
    header("Location: /streetsoul_store1/view/client/login.php");
    exit;
}

// Lấy thông tin từ form
$name    = trim($_POST['name'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');
$total   = $_POST['total'] ?? 0;

// Kiểm tra thông tin
if (empty($name) || empty($phone) || empty($address)) {
    echo "<script>alert('Vui lòng nhập đầy đủ Họ tên, Số điện thoại và Địa chỉ.'); window.history.back();</script>";
    exit;
}

// Lấy ID users
$user_id = $_SESSION['user']['id'];

// Gán giá trị mặc định
$total_price  = $total;
$shipping_fee = 30000;
$status       = "Đang xử lý";
$payment_method = $_POST['pttt'] ?? 'COD';

try {
        // Tạo đơn hàng
    $sql = "INSERT INTO orders (user_id, name, phone, address, total_price, shipping_fee, status, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssddss", $user_id, $name, $phone, $address, $total_price, $shipping_fee, $status, $payment_method);
    $stmt->execute();

    // Lấy ID đơn hàng vừa tạo
    $order_id = $conn->insert_id;

    // Lưu sản phẩm trong giỏ vào order_details
    if (!empty($_SESSION['cart'])) {
        $sql_item = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt_item = $conn->prepare($sql_item);
        foreach ($_SESSION['cart'] as $item) {
            $stmt_item->bind_param("iiid", $order_id, $item['id'], $item['quantity'], $item['price']);
            $stmt_item->execute();
        }
    }

    
    // Xóa giỏ hàng
    unset($_SESSION['cart']);
    // Chuyển sang trang thông báo thành công

    echo "<script>alert('Đặt hàng thành công!'); window.location.href='/streetsoul_store1/index.php';</script>";
    exit;



} catch (Exception $e) {
    die("Lỗi đặt hàng: " . $e->getMessage());
}
