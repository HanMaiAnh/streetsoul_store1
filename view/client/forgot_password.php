<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quên mật khẩu</title>
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
        <!-- Form quên mật khẩu -->
    <div class="login">
      <h2>Quên mật khẩu</h2>
      <form method="POST" action="forgot_password_process.php">
        <div class="inputBox">
          <input type="email" name="email" placeholder="Nhập email của bạn" required>
        </div>

        <div class="inputBox">
          <input type="submit" id="btn" value="Gửi yêu cầu đặt lại">
        </div>

        <div class="group">
          <a href="login.php">Quay lại đăng nhập</a>
        </div>
      </form>
    </div>
  </section>
</body>
</html>
