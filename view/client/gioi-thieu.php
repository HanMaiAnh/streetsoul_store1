<?php include_once __DIR__ . "/../layout/header.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giới Thiệu - YaMy Shop | Thời Trang Cá Tính</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/streetsoul_store1/public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }
  .core-block {
    background-color: transparent;
    box-shadow: none;
    padding: 0;
    transition: all 0.3s ease;
}
    .core-block:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }
   .core-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 0; /* Không bo góc */
    margin-bottom: 15px;
}
  .aboutus-intro {
    background-color: #fdfdfd;
    padding: 30px;
    border-left: 4px solid #dc3545;
    border-radius: 0; /* Không bo góc */
    margin-bottom: 50px;
    box-shadow: none; /* Không cần bóng nếu muốn nhẹ */
}
    .ziczac-1 { margin-top: 0px; }
    .ziczac-2 { margin-top: 50px; }
    .ziczac-3 { margin-top: 100px; }
  </style>
</head>
<body>

<section class="aboutus py-5" id="aboutus">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="text-danger">Chào mừng đến với YaMy Shop</h2>
      <p class="text-muted">Nơi bạn không chỉ mua sắm mà còn khẳng định cá tính!</p>
      <hr style="width:60px; border-top: 3px solid #212121; margin: 0 auto 30px;">
    </div>

    <!-- Giới thiệu nằm trên -->
    <div class="aboutus-intro">
      <h4 class="mb-3 text-danger">Về YaMy Shop</h4>
      <p><strong>YaMy Shop</strong> là thương hiệu thời trang hiện đại dành cho giới trẻ yêu thích sự mới mẻ, cá tính và phong cách. Chúng tôi cung cấp đa dạng sản phẩm như áo thun, hoodie, quần jean, váy, phụ kiện... với chất lượng cao và giá cả hợp lý.</p>
      <p>Chúng tôi tin rằng thời trang là cách thể hiện bản thân rõ ràng nhất. Với phương châm "Mặc đẹp - Sống chất", YaMy không ngừng đổi mới, cập nhật xu hướng để đồng hành cùng khách hàng trong hành trình làm đẹp mỗi ngày.</p>
    </div>

    <!-- 3 khối so le -->
  <div class="row text-center">
  <div class="col-md-4 ziczac-1">
    <div class="core-block">
      <img src="/streetsoul_store1/public/images/sumenh.jpg" alt="Sứ mệnh" class="core-image">
      <h5 class="text-danger mt-3">Sứ mệnh</h5>
      <p class="small">Mang đến trải nghiệm mua sắm thời trang tuyệt vời nhất cho giới trẻ Việt Nam.</p>
    </div>
  </div>
  <div class="col-md-4 ziczac-2">
    <div class="core-block">
      <img src="/streetsoul_store1/public/images/taodang.jpg" alt="Tầm nhìn" class="core-image">
      <h5 class="text-danger mt-3">Tầm nhìn</h5>
      <p class="small">Trở thành thương hiệu thời trang uy tín, được yêu thích hàng đầu khu vực Đông Nam Á.</p>
    </div>
  </div>
  <div class="col-md-4 ziczac-3">
    <div class="core-block">
      <img src="/streetsoul_store1/public/images/cotloi.jpg" alt="Giá trị cốt lõi" class="core-image">
      <h5 class="text-danger mt-3">Giá trị cốt lõi</h5>
      <ul class="small text-start ps-3">
        <li>Chất lượng & sáng tạo</li>
        <li>Khách hàng là trung tâm</li>
        <li>Đổi mới liên tục</li>
        <li>Phong cách độc đáo</li>
      </ul>
    </div>
  </div>
</div>


    <!-- Video -->
    <div class="mt-5">
      <h4 class="mb-4 text-center text-danger">Video chi tiết</h4>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/pxt5O0Zfu9A" title="YaMy Shop Video" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . "/../layout/footer.php"; ?>
</body>
</html>
