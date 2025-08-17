<?php
session_start();
include_once __DIR__ . "/../layout/header.php";
include_once __DIR__ . "/../../config/db.php";

// Kết nối DB
$database = new Database();
$conn = $database->conn;

// Truy vấn tất cả đơn hàng
$query = "SELECT * FROM orders ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<div class="order-history container">
    <h2>Trạng thái đơn hàng</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($order = $result->fetch_assoc()): ?>
            <div class="order-box">
                <p><strong>Mã đơn:</strong> #<?php echo $order['id']; ?></p>
                <p><strong>Khách hàng:</strong> <?php echo htmlspecialchars($order['name']); ?></p>
                <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
                <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($order['phone']); ?></p>
                <p><strong>Ngày đặt:</strong> <?php echo date("d/m/Y H:i", strtotime($order['created_at'])); ?></p>
                <p><strong>Tổng tiền:</strong> <?php echo number_format($order['total_price']); ?> VNĐ</p>
                <p><strong>Trạng thái:</strong> 
                    <span class="status-label">
                        <?php echo !empty($order['status']) ? htmlspecialchars($order['status']) : "Đang chờ xác nhận"; ?>
                    </span>
                </p>

                <!-- Chi tiết sản phẩm của đơn -->
                <div class="order-products">
                    <table>
                        <tbody>
                        <?php
                            $order_id = $order['id'];
                            $detailQuery = "SELECT od.*, p.gallery FROM order_details od
                                            LEFT JOIN products p ON od.product_id = p.id
                                            WHERE od.order_id = $order_id";
                            $detailsResult = $conn->query($detailQuery);

                            while ($item = $detailsResult->fetch_assoc()):
                                $thumbnail = null;

                                if (!empty($item['gallery']) && is_string($item['gallery'])) {
                                    // Thử decode JSON
                                    $gallery = json_decode($item['gallery'], true);
                                    if (json_last_error() === JSON_ERROR_NONE && !empty($gallery)) {
                                        $thumbnail = $gallery[0]; // lấy ảnh đầu tiên trong mảng
                                    } else {
                                        // Nếu không phải JSON thì coi như chỉ lưu tên file ảnh
                                        $thumbnail = $item['gallery'];
                                    }
                                }
                        ?>
                            <tr>
                                <td>
                                    <?php if ($thumbnail): ?>
                                        <img src="/streetsoul_store1/public/images/<?php echo htmlspecialchars($thumbnail); ?>" 
                                             alt="Ảnh sản phẩm" width="100">
                                    <?php else: ?>
                                        <span>Không có ảnh</span>
                                    <?php endif; ?>
                                </td>
                                <!-- <td><?php echo htmlspecialchars($item['product']); ?></td> -->
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo number_format($item['price']); ?> VNĐ</td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Chưa có đơn hàng nào được đặt.</p>
    <?php endif; ?>
</div>

<?php include_once __DIR__ . "/../layout/footer.php"; ?>
