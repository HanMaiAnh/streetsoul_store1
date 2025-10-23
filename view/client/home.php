<?php
// ======= FILE: home.php =======

include_once __DIR__ . "/../../config/db.php";
include_once __DIR__ . "/../../model/product.model.php";
include_once __DIR__ . "/../layout/header.php";

// Khởi tạo đối tượng Database và lấy danh sách sản phẩm
$database = new Database();
$conn = $database->conn;

// Truy vấn tất cả sản phẩm
$sql = "SELECT * FROM products"; // bảng sản phẩm có tên là "products"
$result = $conn->query($sql);

// Kiểm tra và gán kết quả vào biến $allProducts
$allProducts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $allProducts[] = $row;
    }
}

$featuredProducts = [];
$hotSaleProducts = [];

// Lọc sản phẩm nổi bật và giảm giá
foreach ($allProducts as $product) {
    if ($product['is_featured']) {
        $featuredProducts[] = $product;
    } elseif ($product['is_hot_sale']) {
        $hotSaleProducts[] = $product;
    }   
}
?>

<!-- Banner -->
<style>
  .banner {
    position: relative;
    width: 100%;
    height: 500px;
    margin: 0;
    overflow: hidden;
  }

  .slides {
    display: flex;
    height: 100%;
    transition: transform 1s ease-in-out; /* giảm từ 2s xuống 1s */
    will-change: transform;
  }

  .slides img {
  flex: 0 0 100%;
  width: 100%;
  height: 100%;
  object-fit: contain; /* Hiển thị nguyên vẹn ảnh */
  background-color: #000; /* Nền đen cho đẹp khi có khoảng trống */
  display: block;
}

  .nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.45);
    color: #fff;
    border: none;
    font-size: 1.8rem;
    padding: 10px 14px;
    cursor: pointer;
    border-radius: 50%;
    z-index: 20;
  }
  .nav-btn:hover { background: rgba(0,0,0,0.7); }
  .prev { left: 16px; }
  .next { right: 16px; }

  .dots {
    position: absolute;
    left: 50%;
    bottom: 12px;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
    z-index: 20;
  }
  .dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: rgba(255,255,255,0.45);
    border: none;
    cursor: pointer;
    padding: 0;
  }
  .dot.active {
    background: #fff;
    box-shadow: 0 0 0 6px rgba(0,0,0,0.12);
  }
</style>

<div class="banner" id="banner">
  <div class="slides" id="slides">
    <img src="public/images/banner1.png" alt="Banner 1">  
    <img src="public/images/banner2.png" alt="Banner 2">
    <img src="public/images/banner3.png" alt="Banner 3">
    <img src="public/images/banner4.png" alt="Banner 4">
  </div>

  <button class="nav-btn prev" id="prev">❮</button>
  <button class="nav-btn next" id="next">❯</button>

  <div class="dots" id="dots"></div>
</div>

<script>
  const slidesEl = document.getElementById('slides');
  const slides = slidesEl.children;
  const total = slides.length;
  const banner = document.getElementById('banner');

  let index = 0;
  const AUTOPLAY_DELAY = 6000;
  let timer = null;

  function update() {
    // Chỉ cần index * 100% vì mỗi ảnh = 100% khung
    slidesEl.style.transform = `translateX(-${index * 100}%)`;
    document.querySelectorAll('.dot').forEach((d, i) => d.classList.toggle('active', i === index));
  }

  function nextSlide() { index = (index + 1) % total; update(); resetTimer(); }
  function prevSlide() { index = (index - 1 + total) % total; update(); resetTimer(); }
  function goTo(i) { index = i % total; if (index < 0) index += total; update(); resetTimer(); }

  const dotsWrap = document.getElementById('dots');
  for (let i = 0; i < total; i++) {
    const btn = document.createElement('button');
    btn.className = 'dot';
    btn.addEventListener('click', () => goTo(i));
    dotsWrap.appendChild(btn);
  }

  document.getElementById('next').addEventListener('click', nextSlide);
  document.getElementById('prev').addEventListener('click', prevSlide);

  function startTimer() {
    stopTimer();
timer = setInterval(nextSlide, AUTOPLAY_DELAY);
  }
  function stopTimer() { if (timer) clearInterval(timer); }
  function resetTimer() { startTimer(); }

  banner.addEventListener('mouseenter', stopTimer);
  banner.addEventListener('mouseleave', startTimer);

  Array.from(slides).forEach(img => {
    img.addEventListener('error', () => {
      img.src = 'public/images/placeholder.jpg';
      img.style.background = '#000';
    });
  });

  update();
  startTimer();
</script> 

<!-- Sản phẩm nổi bật -->
<div class="container">
<style>
  .section-banner {
    width: 100%;
    text-align: center;
    margin: 30px 0;
  }

  .section-banner img {
    width: 100%;
    max-width: 1200px; /* Giới hạn kích thước tối đa */
    height: auto;
    border-radius: 12px;
    object-fit: cover;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }

  .section-banner img:hover {
    transform: scale(1.02);
    box-shadow: 0 6px 18px rgba(0,0,0,0.25);
  }

  @media (max-width: 768px) {
    .section-banner img {
      max-width: 95%;
    }
  }
</style>


<div class="section-banner">
  <img src="/streetsoul_store1/public/images/banner-noi-bat.jpg" alt="Banner nổi bật">
</div>

    <div class="product-list">
        <?php foreach (array_slice($featuredProducts, 0, 8) as $product): ?>
            <div class="product">
            <div class="product-icons">
              <button class="icon-btn"><i class="fas fa-heart"></i></button>
              <button class="icon-btn"><i class="fas fa-shopping-cart"></i></button>
              </div>
              
                <a href="/streetsoul_store1/view/client/productDetail.php?id=<?php echo $product['id']; ?>">
                    <img src="/streetsoul_store1/public/images/<?php echo htmlspecialchars($product['image']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>">
                         
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    
                    <p class="price">
                        <?php echo number_format($product['price']); ?> VNĐ
                    </p>
                </a>
                <div class="product-buttons">
                        <form action="index.php?page=addToCart" method="POST">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">
                        <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                        <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="buy-now">Mua ngay</button>
                    </form>
                </div> 
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Sản phẩm giảm giá -->
<div class="container">
        <h2>Sản phẩm giảm giá</h2>
    <div class="section-banner">
        <img src="/streetsoul_store1/public/images/banner-sale.jpg" alt="Banner giảm giá">
    </div>
    <div class="product-list">
        <?php foreach (array_slice($hotSaleProducts, 0, 8) as $product): 
            $originalPrice = $product['price'];
            $discountedPrice = $originalPrice * 0.7;
        ?>
            <div class="product">
                <a href="/streetsoul_store1/view/client/productDetail.php?id=<?php echo $product['id']; ?>">
                    <img src="/streetsoul_store1/public/images/<?php echo htmlspecialchars($product['image']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="original-price">
                        <?php echo number_format($originalPrice); ?> VNĐ
                    </p>
                    <p class="discounted-price">
                        <?php echo number_format($discountedPrice); ?> VNĐ
                    </p>
                </a>
                <div class="product-buttons">
    <form action="index.php?page=addToCart" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <input type="hidden" name="quantity" value="1">
        <button type="submit" class="buy-now">Mua ngay</button>
    </form>
</div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
