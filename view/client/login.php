<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tendangnhap = $_POST['tendangnhap'] ?? '';
    $matkhau = $_POST['matkhau'] ?? '';

    try {
        $conn = new PDO("mysql:host=localhost;dbname=streetsoul_store999;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM users WHERE tendangnhap = ? AND matkhau = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$tendangnhap, $matkhau]);

        if ($stmt->rowCount() === 1) {
            $_SESSION['user'] = $stmt->fetch(PDO::FETCH_ASSOC);
            header("Location:/streetsoul_store1/index.php");
            exit;
        } else {
            $error = "Sai tên đăng nhập hoặc mật khẩu!";
        }
    } catch (PDOException $e) {
        $error = "Lỗi kết nối CSDL: " . $e->getMessage();
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Modal Đăng nhập -->
<div class="modal fade show" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" style="display:block;">
  <div class="modal-dialog">
    <form action="" method="POST" class="modal-content p-4">
      
      <!-- Tiêu đề -->
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="loginModalLabel">Đăng nhập</h5>
        <a href="/streetsoul_store1/index.php" class="btn-close"></a>
      </div>

      <div class="modal-body">

        <!-- Nút đăng nhập Facebook -->
        <a href="#" class="btn w-100 mb-2 text-white" style="background-color: #3b5998;">
          <i class="bi bi-facebook me-2"></i> Đăng nhập bằng Facebook
        </a>

        <!-- Nút đăng nhập Google -->
        <a href="#" class="btn w-100 mb-4 text-white" style="background-color: #db4437;">
          <i class="bi bi-google me-2"></i> Đăng nhập bằng Google
        </a>

        <!-- Hiển thị lỗi -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- Tài khoản -->
        <div class="mb-3">
          <label for="username" class="form-label">Tài khoản</label>
          <input type="text" id="username" class="form-control" name="tendangnhap" required>
        </div>

        <!-- Mật khẩu -->
        <div class="mb-3">
          <label for="password" class="form-label">Mật khẩu</label>
          <input type="password" id="password" class="form-control" name="matkhau" required>
        </div>

        <!-- Ghi nhớ -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
<label for="rememberMe" class="form-check-label">Ghi nhớ tài khoản</label>
          </div>
        </div>

        <!-- Nút đăng nhập -->
        <button type="submit" class="btn w-100 text-white" style="background-color: #007bff;">Đăng nhập</button>

        <!-- Link đăng ký -->
        <div class="text-center mt-3">
          <small>Bạn chưa có tài khoản? 
            <a href="/streetsoul_store1/view/client/register.php" class="text-primary">Đăng ký ngay</a>
          </small>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
