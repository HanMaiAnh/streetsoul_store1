<?php
session_start();
include_once __DIR__ . "/../../config/db.php";
include_once __DIR__ . "/../layout/header.php";

// Khởi tạo giỏ hàng
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý xóa từng sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_id'])) {
    unset($_SESSION['cart'][$_POST['remove_id']]);
}

// Xử lý xóa nhiều sản phẩm được chọn
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_selected']) && !empty($_POST['selected_items'])) {
    foreach ($_POST['selected_items'] as $removeId) {
        unset($_SESSION['cart'][$removeId]);
    }
}

// Cập nhật số lượng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id']) && isset($_POST['quantity'])) {
    $updateId = $_POST['update_id'];
    $newQuantity = (int) $_POST['quantity'];
    if ($newQuantity > 0) {
        $_SESSION['cart'][$updateId]['quantity'] = $newQuantity;
    }
}

// Thêm sản phẩm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        $cartItem = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1,
            'image' => $product['image'] ?? 'default.jpg',
            'color' => $product['color'] ?? 'Không rõ',
            'size' => $product['size'] ?? 'Không rõ',
        ];

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$productId] = $cartItem;
        }
    }
}

// Áp dụng mã khuyến mãi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apply_promo'])) {
    $promoCode = strtoupper(trim($_POST['promo_code']));
    $discount = match ($promoCode) {
        'YMS20' => 20000,
        'YMS40' => 40000,
        'YMS70' => 70000,
        'YMS150' => 100000,
        default => 0
    };

    if ($discount > 0) {
        $_SESSION['discount'] = $discount;
        $_SESSION['promo_code'] = $promoCode;
        $_SESSION['promo_message'] = "🎉 Mã {$promoCode} được áp dụng! Giảm " . number_format($discount) . "₫";
    } else {
        unset($_SESSION['discount'], $_SESSION['promo_code']);
        $_SESSION['promo_message'] = "❌ Mã khuyến mãi không hợp lệ!";
    }
}

// Xóa mã khuyến mãi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_promo'])) {
    unset($_SESSION['discount'], $_SESSION['promo_code'], $_SESSION['promo_message']);
}
?>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-6xl mx-auto px-4 py-10 font-[Poppins]">
    <h2 class="text-3xl font-semibold mb-8 text-center text-gray-800">🛒 Giỏ hàng của bạn</h2>

    <?php if (!empty($_SESSION['cart'])): ?>
    <form method="POST">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Danh sách sản phẩm -->
            <div class="md:col-span-2 bg-white p-6 rounded-2xl shadow-md border border-gray-100">
                <div class="flex justify-between border-b pb-3 mb-4 text-gray-600 text-sm font-medium uppercase tracking-wide">
                    <div class="w-6 text-center">
                        <input type="checkbox" id="checkAll" class="w-4 h-4 text-orange-500 rounded cursor-pointer">
                    </div>
                    <span class="w-1/2">Sản phẩm</span>
                    <span class="w-1/4 text-center">Số lượng</span>
                    <span class="w-1/4 text-right">Tổng</span>
                </div>

                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $id => $product): 
                    $name = $product['name'];
                    $price = $product['price'];
                    $quantity = $product['quantity'];
                    $image = $product['image'];
                    $subtotal = $price * $quantity;
                    $total += $subtotal;
                ?>
                <div class="flex flex-col md:flex-row items-center justify-between border-b py-4 hover:bg-gray-50 transition-all rounded-lg">
                    <div class="w-6 text-center">
                        <input type="checkbox" name="selected_items[]" value="<?php echo $id; ?>" class="item-check w-4 h-4 text-orange-500 rounded cursor-pointer">
                    </div>

                    <div class="flex items-center gap-4 w-full md:w-1/2">
                        <img src="/streetsoul_store1/public/images/<?php echo htmlspecialchars($image); ?>" 
                             alt="<?php echo htmlspecialchars($name); ?>" 
                             class="w-20 h-20 object-cover rounded-lg border">
                        <div>
                            <h3 class="font-semibold text-gray-800"><?php echo htmlspecialchars($name); ?></h3>
                            <p class="text-gray-500 text-sm"><?php echo number_format($price); ?>₫</p>
                        </div>
                    </div>

                    <div class="flex items-center mt-3 md:mt-0 gap-2">
                        <form method="POST" class="flex items-center border rounded-lg px-2">
                            <input type="hidden" name="update_id" value="<?php echo $id; ?>">
                            <button type="submit" name="quantity" value="<?php echo max(1, $quantity - 1); ?>" class="px-2 text-lg font-medium">−</button>
                            <span class="px-3 font-medium"><?php echo $quantity; ?></span>
                            <button type="submit" name="quantity" value="<?php echo $quantity + 1; ?>" class="px-2 text-lg font-medium">+</button>
                        </form>
                        <form method="POST" class="ml-2">
                            <input type="hidden" name="remove_id" value="<?php echo $id; ?>">
                            <button type="submit" class="text-gray-400 hover:text-red-500 text-lg transition">🗑️</button>
                        </form>
                    </div>

                    <div class="text-gray-900 font-semibold text-right mt-3 md:mt-0 w-24">
                        <?php echo number_format($subtotal); ?>₫
                    </div>
                </div>
                <?php endforeach; ?>

                <button type="submit" name="remove_selected"
                        class="mt-5 bg-red-500 text-white py-2.5 px-4 rounded-lg font-medium hover:bg-red-600 transition-all duration-300">
                    🗑️ Xóa sản phẩm đã chọn
                </button>
            </div>

            <!-- Tổng thanh toán -->
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 h-fit">
                <h3 class="text-lg font-semibold mb-3 text-gray-800">Tóm tắt đơn hàng</h3>

                <!-- Mã khuyến mãi -->
                <label class="block text-sm text-gray-600 mb-2 font-medium">Mã khuyến mãi</label>
                <div class="relative flex items-center mb-4">
                    <input type="text" name="promo_code" placeholder="Nhập mã (VD: YMS20)"
                        value="<?php echo $_SESSION['promo_code'] ?? ''; ?>"
                        class="flex-1 border border-gray-300 rounded-xl px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-orange-400">
                    <button type="submit" name="apply_promo"
                        class="absolute right-1 top-1 bottom-1 bg-orange-500 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-orange-600">
                        Áp dụng
                    </button>
                </div>

                <?php if (isset($_SESSION['promo_message'])): ?>
                    <p class="text-xs mb-3 font-medium <?php echo isset($_SESSION['discount']) ? 'text-green-600' : 'text-red-600'; ?>">
                        <?php echo $_SESSION['promo_message']; ?>
                    </p>
                <?php endif; ?>

                <?php 
                    $discount = $_SESSION['discount'] ?? 0;
                    $finalTotal = max($total - $discount, 0);
                ?>

                <?php if ($discount > 0): ?>
                    <div class="flex justify-between text-sm text-green-700 mb-2">
                        <span>Giảm giá (<?php echo htmlspecialchars($_SESSION['promo_code']); ?>)</span>
                        <span>-<?php echo number_format($discount); ?>₫</span>
                    </div>
                    <form method="POST">
                        <button type="submit" name="clear_promo" class="text-xs text-gray-500 hover:text-red-500 underline mb-3">
                            Xóa mã khuyến mãi
                        </button>
                    </form>
                <?php endif; ?>

                <div class="mt-5 rounded-xl border-2 border-orange-400 p-4 bg-orange-50 shadow-sm">
  <div class="flex justify-between items-center">
    <span class="text-gray-800 font-medium text-base">Tổng số tiền ước tính:  </span>
    <span class="text-1.5xl font-extrabold text-orange-600"><?php echo number_format($finalTotal); ?>₫</span>
  </div>
</div>

                <!-- Nút đặt hàng -->
                <form action="/streetsoul_store1/view/client/order.php" method="POST" class="mt-5">
                    <button type="submit"
                        class="w-full bg-orange-500 text-white py-3 rounded-xl font-semibold 
                               hover:bg-orange-600 hover:shadow-md active:scale-[0.98] transition-all duration-300">
                        Đặt hàng miễn phí ship
                    </button>
                </form>
            </div>
        </div>
    </form>

    <div class="text-center mt-8">
        <a href="/streetsoul_store1/view/client/products.php" 
           class="text-gray-600 hover:text-orange-600 underline text-sm font-medium">← Tiếp tục mua sắm</a>
    </div>

    <?php else: ?>
        <p class="text-center text-gray-500 mt-10 text-lg">Giỏ hàng của bạn đang trống</p>
    <?php endif; ?>
</div>

<!-- Script check tất cả -->
<script>
document.getElementById('checkAll')?.addEventListener('change', function() {
    const checked = this.checked;
    document.querySelectorAll('.item-check').forEach(cb => cb.checked = checked);
});
</script>

<?php include __DIR__ . "/../layout/footer.php"; ?>
