<?php
require_once __DIR__ . '/../../config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoten = trim($_POST['hoten']);
    $username = trim($_POST['tendangnhap']);
    $password = password_hash($_POST['matkhau'], PASSWORD_DEFAULT);
    $email = trim($_POST['email']);
    $ngaysinh = $_POST['ngaysinh'] ?? null;
    $phai = $_POST['phai'] ?? 1;

    $database = new Database();
    $conn = $database->getConnection();

    // Kiểm tra trùng username
    $check = $conn->prepare("SELECT * FROM users WHERE tendangnhap = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $error = "Tên đăng nhập đã tồn tại!";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (hoten, tendangnhap, matkhau, email, ngaysinh, phai, vaitro) VALUES (?, ?, ?, ?, ?, ?, 0)");
        $stmt->bind_param("ssssss", $hoten, $username, $password, $email, $ngaysinh, $phai);
        if ($stmt->execute()) {
            header("Location: /streetsoul_store1/view/client/login.php?success=1");
            exit();
        } else {
            $error = "Đăng ký thất bại, vui lòng thử lại!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký - StreetSoul Store</title>
    <link rel="stylesheet" href="/streetsoul_store1/public/auth.css">
</head>
<body>
  <section>
  <!-- Hiệu ứng lá rơi -->
  <div class="leaves">
    <div class="set">
      <div><img src="/streetsoul_store1/public/images/leaf_01.png" alt=""></div>
      <div><img src="/streetsoul_store1/public/images/leaf_02.png" alt=""></div>
      <div><img src="/streetsoul_store1/public/images/leaf_03.png" alt=""></div>
      <div><img src="/streetsoul_store1/public/images/leaf_04.png" alt=""></div>
      <div><img src="/streetsoul_store1/public/images/leaf_01.png" alt=""></div>
      <div><img src="/streetsoul_store1/public/images/leaf_02.png" alt=""></div>
      <div><img src="/streetsoul_store1/public/images/leaf_03.png" alt=""></div>
      <div><img src="/streetsoul_store1/public/images/leaf_04.png" alt=""></div>
    </div>
  </div>

  <!-- Hình nền và nhân vật -->
  <img src="/streetsoul_store1/public/images/bg.jpg" class="bg" alt="bg">
  <img src="/streetsoul_store1/public/images/girl.png" class="girl" alt="girl">
  <img src="/streetsoul_store1/public/images/trees.png" class="trees" alt="trees">

    <!-- Form đăng ký -->
    <div class="login">
      <h2>Đăng ký tài khoản</h2>
      <form method="POST" action="register_process.php">
        <div class="inputBox">
          <input type="text" name="fullname" placeholder="Họ và tên" required>
        </div>

        <div class="inputBox">
          <input type="text" name="username" placeholder="Tên đăng nhập" required>
        </div>

        <div class="inputBox">
          <input type="email" name="email" placeholder="Địa chỉ Email" required>
        </div>

        <div class="inputBox">
          <input type="password" name="password" placeholder="Mật khẩu" required>
        </div>

        <div class="inputBox">
          <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
        </div>

        <div class="inputBox">
          <input type="submit" id="btn" value="Tạo tài khoản">
        </div>

        <div class="group">
          <a href="login.php">Đã có tài khoản? Đăng nhập</a>
        </div>
      </form>
    </div>
    </div>
</body>
</html>
