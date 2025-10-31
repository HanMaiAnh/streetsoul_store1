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
</style>

<div class="success-container">
    <h2>Đặt hàng thành công!</h2>
    <p>Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ xử lý đơn của bạn sớm nhất.</p>
    <a href="/streetsoul_store1/view/client/products.php" class="btn-orange">← Tiếp tục mua sắm</a>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
