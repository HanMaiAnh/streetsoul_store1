<?php
session_start();
include_once __DIR__ . "/../../config/db.php";
include_once __DIR__ . "/../../model/product.model.php";

$productModel = new Product();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<h2 style='color: red; text-align: center'>Không tìm thấy sản phẩm!</h2>";
    include_once __DIR__ . "/../layout/header.php";
    include_once __DIR__ . "/../layout/footer.php";
    exit;
}

$id = intval($_GET['id']);
$product = $productModel->getProductById($id);

if (!$product) {
    echo "<h2 style='color: red; text-align: center'>Sản phẩm không tồn tại!</h2>";
    include_once __DIR__ . "/../layout/header.php";
    include_once __DIR__ . "/../layout/footer.php";
    exit;
}

include_once __DIR__ . "/../layout/header.php";

$originalPrice = $product['price'];
$isHotSale = !empty($product['is_hot_sale']);

if ($isHotSale) {
    $discountRate = 0.30;
    $discountedPrice = $originalPrice * (1 - $discountRate);
} else {
    $discountedPrice = $originalPrice;
}

$product['gallery'] = !empty($product['gallery']) ? json_decode($product['gallery'], true) : [];
$otherProducts = $productModel->getRandomProducts(4, $product['id']);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="/streetsoul_store1/public/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container product-detail-container">
    <div class="product-image">
        <img id="mainImage" src="/streetsoul_store1/public/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        <div class="thumbnail-container">
            <?php foreach ($product['gallery'] as $image): ?>
                <img class="thumbnail" src="/streetsoul_store1/public/images/<?php echo htmlspecialchars($image); ?>" alt="Thumbnail" onclick="changeImage(this)">
            <?php endforeach; ?>
        </div>
    </div>

    <div class="product-info">
        <h2><?php echo htmlspecialchars($product['name']); ?></h2>

        <?php if ($isHotSale): ?>
            <p class="original-price" style="text-decoration: line-through; color: #999;">
                <?php echo number_format($originalPrice); ?> VNĐ
            </p>
            <p class="discounted-price" id="discountedPrice" style="color: #ff6600; font-weight: bold;">
                <?php echo number_format($discountedPrice); ?> VNĐ
            </p>
        <?php else: ?>
            <p class="price" id="discountedPrice" style="font-weight: bold;">
                <?php echo number_format($originalPrice); ?> VNĐ
            </p>
        <?php endif; ?>
<div class="promo-box" 
     style="border:1px solid #e5e5e5;border-radius:8px;padding:10px 16px;background-color:#fffafa;
            margin:18px 0;box-shadow:0 1px 4px rgba(0,0,0,0.04);font-family:sans-serif;">
  <h4 style="font-size:15px;font-weight:600;color:#e63946;margin-bottom:8px;display:flex;
             align-items:center;gap:5px;">🎁 Khuyến mãi</h4>

  <div style="font-size:13px;color:#333;margin-bottom:4px;line-height:1.4;">🔸 Mã <b>YMS20</b>: Giảm 20K (đơn từ 299K)</div>
  <div style="font-size:13px;color:#333;margin-bottom:4px;line-height:1.4;">🔸 Mã <b>YMS40</b>: Giảm 40K (đơn từ 599K)</div>
  <div style="font-size:13px;color:#333;margin-bottom:4px;line-height:1.4;">🔸 Mã <b>YMS70</b>: Giảm 70K (đơn từ 899K)</div>
  <div style="font-size:13px;color:#333;margin-bottom:4px;line-height:1.4;">🔸 Mã <b>YMS150</b>: Giảm 100K (đơn từ 1199K)</div>
  <div style="font-size:13px;color:#333;margin-bottom:4px;line-height:1.4;">🚚 Freeship đơn từ 399K</div>

  <div style="display:flex;gap:6px;margin-top:8px;flex-wrap:wrap;">
    <button style="background-color:#e63946;color:#fff;border:none;border-radius:5px;padding:4px 10px;
                   font-size:12px;font-weight:600;cursor:pointer;text-transform:uppercase;
                   transition:all 0.25s;" 
            onmouseover="this.style.backgroundColor='#c1121f'" 
            onmouseout="this.style.backgroundColor='#e63946'">
      YMS20
    </button>

    <button style="background-color:#e63946;color:#fff;border:none;border-radius:5px;padding:4px 10px;
                   font-size:12px;font-weight:600;cursor:pointer;text-transform:uppercase;
                   transition:all 0.25s;" 
            onmouseover="this.style.backgroundColor='#c1121f'" 
            onmouseout="this.style.backgroundColor='#e63946'">
      YMS40
    </button>

    <button style="background-color:#e63946;color:#fff;border:none;border-radius:5px;padding:4px 10px;
                   font-size:12px;font-weight:600;cursor:pointer;text-transform:uppercase;
                   transition:all 0.25s;" 
            onmouseover="this.style.backgroundColor='#c1121f'" 
            onmouseout="this.style.backgroundColor='#e63946'">
      YMS70
    </button>

    <button style="background-color:#e63946;color:#fff;border:none;border-radius:5px;padding:4px 10px;
                   font-size:12px;font-weight:600;cursor:pointer;text-transform:uppercase;
                   transition:all 0.25s;" 
            onmouseover="this.style.backgroundColor='#c1121f'" 
            onmouseout="this.style.backgroundColor='#e63946'">
      YMS150
    </button>
  </div>
</div>



<label style="font-weight:600;display:block;margin-top:15px;margin-bottom:6px;font-size:15px;">
  Kích thước:
</label>

<div id="size-list" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:20px;">
  <button style="border:1px solid #000;background-color:#000;color:#fff;padding:8px 16px;border-radius:6px;
                 font-size:14px;font-weight:500;cursor:pointer;min-width:44px;text-align:center;">S</button>
  <button style="border:1px solid #ddd;background-color:#fff;color:#222;padding:8px 16px;border-radius:6px;
                 font-size:14px;font-weight:500;cursor:pointer;min-width:44px;text-align:center;">M</button>
  <button style="border:1px solid #ddd;background-color:#fff;color:#222;padding:8px 16px;border-radius:6px;
                 font-size:14px;font-weight:500;cursor:pointer;min-width:44px;text-align:center;">L</button>
  <button style="border:1px solid #ddd;background-color:#fff;color:#222;padding:8px 16px;border-radius:6px;
                 font-size:14px;font-weight:500;cursor:pointer;min-width:44px;text-align:center;">XL</button>
</div>

<script>
  // Chức năng chọn size
  const sizeButtons = document.querySelectorAll('#size-list button');
  sizeButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      sizeButtons.forEach(b => {
        b.style.backgroundColor = '#fff';
        b.style.color = '#222';
        b.style.border = '1px solid #ddd';
      });
      this.style.backgroundColor = '#000';
      this.style.color = '#fff';
      this.style.border = '1px solid #000';
    });
  });
</script>

        <div class="description">
            <h3>Mô tả sản phẩm</h3>
            <p>Đây là một chiếc áo thun cotton cao cấp,
            thoáng mát, thích hợp cho mọi thời tiết.
            Thiết kế trẻ trung, dễ phối đồ.
            </p>
        </div>


<div class="buttons" style="
  display: flex; 
  align-items: center; 
  gap: 12px; 
  margin-top: 25px;
  flex-wrap: wrap;
  font-family: 'Poppins', sans-serif;
">

  <!-- Bộ chọn số lượng -->
  <div style="
    display: flex; 
    align-items: center; 
    border: 1px solid #ccc; 
    border-radius: 12px;
    overflow: hidden;
    box-shadow: inset 0 0 5px rgba(0,0,0,0.05);
  ">
    <button id="decreaseQty" style="
      width: 40px; height: 40px; 
      font-size: 20px; font-weight: 600; 
      border: none; background: #f8f8f8; 
      cursor: pointer; transition: all 0.25s; color: #333;
    ">−</button>

    <input id="quantity" type="text" value="1" readonly style="
      width: 50px; height: 40px; 
      text-align: center; 
      border: none; 
      background: white; 
      font-size: 16px; 
      font-weight: 500; color: #222;
    ">

    <button id="increaseQty" style="
      width: 40px; height: 40px; 
      font-size: 20px; font-weight: 600; 
      border: none; background: #f8f8f8; 
      cursor: pointer; transition: all 0.25s; color: #333;
    ">+</button>
  </div>

  <!-- Nút thêm vào giỏ hàng -->
  <button class="custom-btn" id="addToCartBtn" 
      data-id="<?= $product['id'] ?>" 
      data-name="<?= htmlspecialchars($product['name']) ?>" 
      data-price="<?= $discountedPrice ?>" style="
        background: linear-gradient( #ff8f00);
        color: white; border: none; 
        padding: 11px 26px; 
        border-radius: 10px; 
        cursor: pointer; 
        font-weight: 600; 
        letter-spacing: 0.3px;
        transition: all 0.3s;
        font-size: 15px;
      " 
      onmouseover="this.style.background='linear-gradient( #ff8f00)';"
      onmouseout="this.style.background='linear-gradient( #ff6f00)';">
      🛒 Thêm vào giỏ hàng
  </button>

  <!-- Form mua ngay -->
  <form id="buyNowForm" action="/streetsoul_store1/controller/cart.controller.php" method="POST" style="margin: 0;">
    <input type="hidden" name="action" value="buyNow">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <input type="hidden" name="name" value="<?= htmlspecialchars($product['name']) ?>">
    <input type="hidden" name="price" value="<?= $discountedPrice ?>">
    <input type="hidden" name="quantity" id="buyNowQuantity" value="1">
    <button type="submit" class="buy-now-btn" style="
      background: linear-gradient(#ff8f00);
      color: white; border: none; 
      padding: 11px 26px; 
      border-radius: 10px; 
      cursor: pointer; 
      font-weight: 600; 
      letter-spacing: 0.3px;
      transition: all 0.3s;
      font-size: 15px;
    " 
    onmouseover="this.style.background='linear-gradient( #ff8f00)';"
    onmouseout="this.style.background='linear-gradient( #ff8f00,)';">
      ⚡ Mua ngay
    </button>
  </form>

</div>


<script>
  const decreaseBtn = document.getElementById("decreaseQty");
  const increaseBtn = document.getElementById("increaseQty");
  const quantityInput = document.getElementById("quantity");
  const buyNowQuantity = document.getElementById("buyNowQuantity");

  decreaseBtn.addEventListener("click", () => {
    let qty = parseInt(quantityInput.value);
    if (qty > 1) {
      quantityInput.value = qty - 1;
      buyNowQuantity.value = qty - 1;
    }
  });

  increaseBtn.addEventListener("click", () => {
    let qty = parseInt(quantityInput.value);
    quantityInput.value = qty + 1;
    buyNowQuantity.value = qty + 1;
  });

  // Hiệu ứng hover cho 2 nút
  const style = document.createElement("style");
  style.innerHTML = `
    .custom-btn:hover, .buy-now-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 14px rgba(0,132,176,0.4);
      opacity: 0.95;
    }
    #increaseQty:hover, #decreaseQty:hover {
      background: #eee;
      transform: scale(1.05);
    }
  `;
  document.head.appendChild(style);
</script>

    </div>
</div>
                
<div class="container related-products">
    <h3>Các sản phẩm khác</h3>
    <div class="product-list">
        <?php foreach ($otherProducts as $item): ?>
            <?php
                $isItemHotSale = !empty($item['is_hot_sale']);
                $itemOriginalPrice = $item['price'];
                $itemDiscountedPrice = $isItemHotSale ? $itemOriginalPrice * 0.7 : $itemOriginalPrice;
            ?>
            <div class="product">
                <a href="productDetail.php?id=<?= $item['id'] ?>">
                    <img src="/streetsoul_store1/public/images/<?= $item['image'] ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                    <h3><?= htmlspecialchars($item['name']) ?></h3>
                    <?php if ($isItemHotSale): ?>
                        <p class="original-price" style="text-decoration: line-through; color: #999;">
                            <?= number_format($itemOriginalPrice) ?> VNĐ
                        </p>
                        <p class="discounted-price" style="color: #ff6600; font-weight: bold;">
                            <?= number_format($itemDiscountedPrice) ?> VNĐ
                        </p>
                    <?php else: ?>
                        <p class="price" style="font-weight: bold;">
                            <?= number_format($itemOriginalPrice) ?> VNĐ
                        </p>
                    <?php endif; ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<script>
function changeImage(el) {
    document.getElementById("mainImage").src = el.src;
}

function applyVoucher() {
    let voucherCode = document.getElementById("voucherCode").value;
    let currentPrice = <?= $discountedPrice ?>;
    if (voucherCode === "SALE30") {
        let newPrice = currentPrice * 0.7;
        document.getElementById("discountedPrice").textContent = newPrice.toLocaleString() + " VNĐ";
        alert("Giảm giá thành công!");
    } else {
        alert("Mã không hợp lệ!");
    }
}

$('#addToCartBtn').on('click', function () {
    const id = $(this).data('id');
    const name = $(this).data('name');
    const price = $(this).data('price');

    $.post('/streetsoul_store1/controller/cart.controller.php', {
        action: 'add',
        id,
        name,
        price
    }, function (res) {
        if (res.success) {
            $('#cart-count').text(res.totalItems);
            alert('Đã thêm vào giỏ hàng!');
        } else {
            alert('Thêm vào giỏ thất bại!');
        }
    }, 'json');
});
</script>

<!-- ====================== PHẦN ĐÁNH GIÁ NGƯỜI DÙNG (CHỈ XEM) ====================== -->
<div class="container product-reviews" style="
  margin-top: 50px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  padding: 25px 30px;
  font-family: 'Poppins', sans-serif;
">

  <h3 style="font-size: 22px; font-weight: 600; margin-bottom: 20px;">Đánh giá của người dùng</h3>

  <!-- Danh sách đánh giá hiển thị -->
  <div id="reviewList" style="display: flex; flex-direction: column; gap: 16px;">

    <div style="border-bottom: 1px solid #eee; padding-bottom: 10px;">
      <div style="display: flex; align-items: center; gap: 8px;">
        <strong>Nguyễn Văn A</strong>
        <div style="color: #ffb400;">★★★★★</div>
      </div>
      <p style="margin-top: 5px; color: #444;">Áo đẹp, chất vải mềm, mặc rất thoải mái!</p>
    </div>

    <div style="border-bottom: 1px solid #eee; padding-bottom: 10px;">
      <div style="display: flex; align-items: center; gap: 8px;">
        <strong>Trần Minh B</strong>
        <div style="color: #ffb400;">★★★★☆</div>
      </div>
      <p style="margin-top: 5px; color: #444;">Giao hàng nhanh, form áo đúng như mô tả.</p>
    </div>

    <div style="border-bottom: 1px solid #eee; padding-bottom: 10px;">
      <div style="display: flex; align-items: center; gap: 8px;">
        <strong>Lê Thảo C</strong>
        <div style="color: #ffb400;">★★★★★</div>
      </div>
      <p style="margin-top: 5px; color: #444;">Shop tư vấn nhiệt tình, áo đúng form và đẹp hơn mong đợi!</p>
    </div>

  </div>

  <!-- Ghi chú -->
  <p style="margin-top: 25px; color: #666; font-size: 14px; text-align: center;">
    Tính năng gửi đánh giá sẽ sớm được cập nhật.
  </p>
</div>



<?php include __DIR__ . "/../layout/footer.php"; ?>
