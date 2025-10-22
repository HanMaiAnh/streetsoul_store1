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

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng nhập - StreetSoul Store</title>
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

  <!-- Form đăng nhập -->
  <div class="login">
    <h2>Đăng nhập</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="inputBox">
        <input type="text" name="tendangnhap" placeholder="Tên đăng nhập" required>
      </div>

      <div class="inputBox">
        <input type="password" name="matkhau" placeholder="Mật khẩu" required>
      </div>

      <div class="inputBox">
        <input type="submit" value="Đăng nhập" id="btn">
      </div>

      <div class="group">
        <a href="/streetsoul_store1/view/client/forgot_password.php">Quên mật khẩu?</a>
        <a href="/streetsoul_store1/view/client/register.php">Đăng ký</a>
      </div>
    </form>
  </div>
</section>

</body>
</html>
