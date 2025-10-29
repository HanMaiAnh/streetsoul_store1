<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$totalCartItems = 0;
if (isset($_SESSION['cart'])) {
    $totalCartItems = array_sum(array_column($_SESSION['cart'], 'quantity'));
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>StreetSoul Store</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/streetsoul_store1/public/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
/* ====== RESET ====== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
  margin: 0;
  padding-top: 100px; /* tăng khoảng trống cho header cố định */
  background-color: #fff;
}

/* ====== HEADER ====== */
header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 90px; /* tăng chiều cao cho header */
  background: #fff;
  z-index: 999;
  box-shadow: 0 2px 6px rgba(0,0,0,0.08);
  display: flex;
  align-items: center;
  justify-content: center;
}

.nav-container {
  width: 100%;
  max-width: 1250px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 25px; /* bỏ padding dọc để header không bị dày */
}

/* ====== LOGO ====== */
.logo-img {
  height: 65px;
  width: auto;
  transition: transform 0.3s ease;
  object-fit: contain;
}
.logo-img:hover {
  transform: scale(1.05);
}

/* ====== MENU ====== */
.nav-left a {
  margin-right: 30px;
  text-decoration: none;
  color: #222;
  font-weight: 500;
  font-size: 17px;
  transition: color 0.2s ease;
}
.nav-left a:hover {
  color: #ff6600;
}

/* ====== THANH TÌM KIẾM ====== */
.search-bar {
  flex: 1;
  max-width: 320px;
  position: relative;
  margin: 0 25px;
}
.search-bar input {
  width: 100%;
  padding: 10px 45px 10px 18px;
  border: 1px solid #ddd;
  border-radius: 25px;
  background: #f5f5f5;
  transition: all 0.2s;
  font-size: 15px;
}
.search-bar input:focus {
  background: #fff;
  border-color: #ff6600;
  outline: none;
  box-shadow: 0 0 0 2px rgba(255,102,0,0.2);
}
.search-bar button {
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  border: none;
  background: transparent;
  color: #333;
  font-size: 18px;
  cursor: pointer;
}

/* ====== USER MENU ====== */
.nav-right {
  display: flex;
  align-items: center;
  gap: 20px;
}
.user-menu {
  position: relative;
}
.user-menu i {
  font-size: 22px;
  cursor: pointer;
  color: #222;
  transition: color 0.2s ease;
}
.user-menu i:hover {
  color: #ff6600;
}
.user-dropdown {
  display: none;
  position: absolute;
  right: 0;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 3px 8px rgba(0,0,0,0.1);
  width: 180px;
  z-index: 999;
}
.user-menu:hover .user-dropdown {
  display: block;
}
.user-dropdown a {
  display: block;
  padding: 10px 15px;
  color: #222;
  text-decoration: none;
  font-size: 15px;
}
.user-dropdown a:hover {
  background: #f5f5f5;
  color: #ff6600;
}

/* ====== GIỎ HÀNG ====== */
.cart-icon {
  position: relative;
}
.cart-icon i {
  font-size: 22px;
  color: #222;
  transition: color 0.2s ease;
}
.cart-icon i:hover {
  color: #ff6600;
}
#cart-count {
  position: absolute;
  top: -8px;
  right: -10px;
  background: red;
  color: white;
  font-size: 12px;
  border-radius: 50%;
  padding: 2px 6px;
}

/* ====== ĐẢM BẢO KHÔNG ẢNH HƯỞNG ẢNH BÊN DƯỚI ====== */
main, section {
  margin-top: 0 !important;
}
</style>

<header>
  <div class="nav-container">
    <!-- Logo -->
    <a href="/streetsoul_store1/index.php">
      <img src="/streetsoul_store1/public/images/logoyamy.png" alt="Logo" class="logo-img">
    </a>

    <!-- Menu trái -->
    <div class="nav-left">
      <a href="/streetsoul_store1/index.php">Trang chủ</a>
      <a href="/streetsoul_store1/view/client/products.php">Sản phẩm</a>
      <a href="/streetsoul_store1/view/client/contact.php">Liên hệ</a>
      <a href="/streetsoul_store1/view/client/gioi-thieu.php">Giới thiệu</a>
      <a href="/streetsoul_store1/view/client/news.php">Tin tức</a>
    </div>

    <!-- Thanh tìm kiếm -->
    <form action="/streetsoul_store1/view/client/search.php" method="GET" class="search-bar">
      <input type="text" name="query" placeholder="Tìm kiếm sản phẩm...">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>

    <!-- Menu phải -->
    <div class="nav-right">
      <!-- Giỏ hàng -->
      <a href="/streetsoul_store1/view/client/cart.php" class="cart-icon">
        <i class="fa fa-shopping-cart"></i>
        <span id="cart-count"><?= $totalCartItems; ?></span>
      </a>

      <!-- User -->
      <?php if (isset($_SESSION['user'])): ?>
      <div class="user-menu">
        <i class="fa fa-user"></i>
        <div class="user-dropdown">
          <a href="/streetsoul_store1/view/client/orderUser.php">Đơn hàng</a>
          <?php if ($_SESSION['user']['vaitro'] === 1): ?>
          <a href="/streetsoul_store1/view/admin/dashboard.php">Quản trị</a>
          <?php endif; ?>
          <a href="/streetsoul_store1/view/client/logout.php">Đăng xuất</a>
        </div>
      </div>
      <?php else: ?>
      <div class="user-menu">
        <i class="fa fa-user"></i>
        <div class="user-dropdown">
          <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng nhập</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký</a>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</header>


<!-- ========== MODAL ĐĂNG NHẬP ========== -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="/streetsoul_store1/view/client/login.php" method="POST" class="modal-content modern-modal">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Đăng nhập</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>
      <div class="modal-body">
        <?php if (!empty($_GET['error'])): ?>
          <div class="alert alert-danger text-center rounded-3 py-2"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>

        <div class="mb-3">
          <label class="form-label fw-semibold">Tên đăng nhập</label>
          <div class="input-group input-modern">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" name="tendangnhap" placeholder="Tên đăng nhập..." required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Mật khẩu</label>
          <div class="input-group input-modern">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" name="matkhau" placeholder="••••••••" required>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Ghi nhớ</label>
          </div>
          <a href="#" class="small text-decoration-none text-muted hover-underline">Quên mật khẩu?</a>
        </div>
      </div>

      <div class="modal-footer border-0">
        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-dark rounded-pill px-4">
          <i class="bi bi-box-arrow-in-right me-1"></i> Đăng nhập
        </button>
      </div>
    </form>
  </div>
</div>

<!-- ========== MODAL ĐĂNG KÝ ========== -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="/streetsoul_store1/view/client/register.php" method="POST" class="modal-content modern-modal">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Tạo tài khoản mới</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>

      <div class="modal-body">
        <?php if (!empty($_GET['register_error'])): ?>
          <div class="alert alert-danger text-center rounded-3 py-2"><?= htmlspecialchars($_GET['register_error']) ?></div>
        <?php endif; ?>

        <div class="mb-3">
          <label class="form-label fw-semibold">Họ và tên</label>
          <div class="input-group input-modern">
            <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
            <input type="text" class="form-control" name="hoten" placeholder="Nhập họ và tên..." required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Tên đăng nhập</label>
          <div class="input-group input-modern">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" name="tendangnhap" placeholder="Nhập tên đăng nhập..." required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Mật khẩu</label>
          <div class="input-group input-modern">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" name="matkhau" placeholder="••••••••" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Email</label>
          <div class="input-group input-modern">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Ngày sinh</label>
          <input type="date" class="form-control bg-light border-0" name="ngaysinh">
        </div>

        <label class="form-label fw-semibold">Giới tính</label>
        <div class="d-flex gap-4 ps-2">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="phai" value="1" id="nam">
            <label class="form-check-label" for="nam">Nam</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="phai" value="0" id="nu" checked>
            <label class="form-check-label" for="nu">Nữ</label>
          </div>
        </div>
      </div>

      <div class="modal-footer border-0">
        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-dark rounded-pill px-4">
          <i class="bi bi-person-plus me-1"></i> Đăng ký
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

<?php if (!empty($_GET['error'])): ?>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    new bootstrap.Modal(document.getElementById('loginModal')).show();
  });
</script>
<?php endif; ?>

<?php if (!empty($_GET['register_error'])): ?>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    new bootstrap.Modal(document.getElementById('registerModal')).show();
  });
</script>
<?php endif; ?>

</body>
</html>
