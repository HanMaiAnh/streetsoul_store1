<?php
session_start();
include_once __DIR__ . "/../layout/header.php";
?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f3f4f6;
    }

    .success-container {
        max-width: 550px;
        margin: 100px auto;
        padding: 30px;
        text-align: center;
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .success-container h2 {
        color: #28a745;
        font-size: 26px;
        margin-bottom: 12px;
    }

    .success-container p {
        font-size: 16px;
        color: #555;
        margin-bottom: 24px;
    }

    .btn-orange {
        background-color: #ff9800;
        color: white;
        font-size: 17px;
        padding: 12px 22px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-orange:hover {
        background-color: #e68900;
        transform: translateY(-2px);
    }

    /* ----- Đánh giá ----- */
    .review-box {
        margin-top: 40px;
        text-align: left;
    }

    .review-box h3 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #333;
        text-align: center;
    }

    .stars {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }

    .stars i {
        font-size: 28px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.3s;
    }

    .stars i.active {
        color: #ff9800;
    }

    input[type="text"], textarea {
        width: 100%;
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 15px;
        outline: none;
        transition: border-color 0.2s ease;
        margin-bottom: 12px;
    }

    input[type="text"]:focus, textarea:focus {
        border-color: #ff9800;
    }

    textarea {
        height: 100px;
        resize: none;
    }

    .submit-review {
        margin-top: 12px;
        display: block;
        width: 100%;
        background: #ff9800;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .submit-review:hover {
        background: #e68900;
    }

    .review-message {
        margin-top: 15px;
        text-align: center;
        color: #28a745;
        font-weight: 500;
    }
</style>

<div class="success-container">
    <h2>Đặt hàng thành công!</h2>
    <p>Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ xử lý đơn của bạn sớm nhất.</p>

    <a href="/streetsoul_store1/view/client/products.php" class="btn-orange">← Tiếp tục mua sắm</a>

    <!-- Phần đánh giá -->
    <div class="review-box">
        <h3>Đánh giá trải nghiệm của bạn </h3>
        <input type="text" id="customerName" placeholder="Nhập tên của bạn...">
        
        <div class="stars" id="stars">
            <i class="fa-solid fa-star" data-index="1"></i>
            <i class="fa-solid fa-star" data-index="2"></i>
            <i class="fa-solid fa-star" data-index="3"></i>
            <i class="fa-solid fa-star" data-index="4"></i>
            <i class="fa-solid fa-star" data-index="5"></i>
        </div>

        <textarea id="reviewText" placeholder="Viết cảm nhận của bạn..."></textarea>
        <button class="submit-review" onclick="submitReview()">Gửi đánh giá</button>
        <p class="review-message" id="reviewMessage"></p>
    </div>
</div>

<script src="https://kit.fontawesome.com/a2e0b4a64b.js" crossorigin="anonymous"></script>
<script>
    const stars = document.querySelectorAll('#stars i');
    let selectedRating = 0;

    stars.forEach(star => {
        star.addEventListener('click', () => {
            selectedRating = star.dataset.index;
            stars.forEach(s => s.classList.remove('active'));
            for (let i = 0; i < selectedRating; i++) {
                stars[i].classList.add('active');
            }
        });
    });

    function submitReview() {
        const name = document.getElementById('customerName').value.trim();
        const text = document.getElementById('reviewText').value.trim();
        const msg = document.getElementById('reviewMessage');

        if (name.length < 2) {
            msg.style.color = "red";
            msg.textContent = "Vui lòng nhập tên của bạn!";
            return;
        }

        if (selectedRating === 0) {
            msg.style.color = "red";
            msg.textContent = "Vui lòng chọn số sao để đánh giá!";
            return;
        }

        if (text.length < 5) {
            msg.style.color = "red";
            msg.textContent = "Vui lòng nhập ít nhất 5 ký tự cho nhận xét!";
            return;
        }

        // Hiển thị thông báo cảm ơn tạm thời
        msg.style.color = "#28a745";
        msg.textContent = `Cảm ơn ${name}! Bạn đã đánh giá ${selectedRating} sao.`;

        // Sau 2.5 giây chuyển về trang chủ
        setTimeout(() => {
            window.location.href = "/streetsoul_store1/index.php?review=success";
        }, 2500);
    }

    // Nếu có thông báo từ trang chủ
    const params = new URLSearchParams(window.location.search);
    if (params.get("review") === "success") {
        alert("Cảm ơn bạn đã gửi đánh giá cho shop!");
    }
</script>

<?php include __DIR__ . "/../layout/footer.php"; ?>
