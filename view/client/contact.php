

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Liên hệ</title>
    <!-- Thêm link Google Fonts trong <head> -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f7f7f7;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .contact-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    .contact-inner {
        width: 100%;
        max-width: 960px;
    }

    .contact-info {
        text-align: center;
        margin-bottom: 25px;
    }

    .contact-info h2 {
        font-size: 26px;
        font-weight: 600;
        color: #222;
        margin-bottom: 10px;
    }

    .contact-info p {
        font-size: 15px;
        margin: 5px 0;
    }

    .contact-info span {
        color: #ff5a00;
        font-weight: 500;
    }

    /* Khung chứa chính */
    .contact-content {
        display: flex;
        gap: 30px;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    /* Form liên hệ */
    .contact-form {
        flex: 1;
        min-width: 340px;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }

    .contact-form:hover {
        transform: translateY(-3px);
    }

    .form-group {
        margin-bottom: 18px;
    }

    input,
    textarea {
        width: 100%;
        padding: 12px 14px;
        border: 1.8px solid #ff6600;
        border-radius: 6px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
        background: #fff;
    }

    input:focus,
    textarea:focus {
        border-color: #ff4500;
        box-shadow: 0 0 6px rgba(255, 102, 0, 0.3);
        outline: none;
    }

    textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* Nút gửi */
    .btn {
        background-color: #ff6600;
        font-size: 16px;
        padding: 12px 20px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        width: 100%;
        font-weight: 500;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn:hover {
        background-color: #e65c00;
        transform: scale(1.02);
    }

    /* Google Map */
    .contact-map {
        flex: 1;
        min-width: 340px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    .contact-map iframe {
        width: 100%;
        height: 100%;
        min-height: 430px;
        border: none;
    }

    /* Thông báo */
    .message {
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 18px;
        font-size: 14px;
        text-align: center;
        font-weight: 500;
    }

    .message.success {
        background-color: #dff0d8;
        color: #3c763d;
    }

    .message.error {
        background-color: #f2dede;
        color: #a94442;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .contact-content {
            flex-direction: column;
        }
        .contact-map iframe {
            min-height: 350px;
        }
    }
</style>


    
</head>
<body>

<?php
session_start();
include_once __DIR__ . "/../layout/header.php";

$successMsg = $_SESSION['successMsg'] ?? "";
$errorMsg   = $_SESSION['errorMsg'] ?? "";

// Xóa session sau khi hiển thị
unset($_SESSION['successMsg'], $_SESSION['errorMsg']);
?>
<!-- HTML giữ nguyên -->
<div class="contact-container">
    <div class="contact-inner">
        <div class="contact-info">
            <h2>Ý KIẾN CỦA BẠN VỀ YAMY</h2>
            <p><strong>Địa chỉ:</strong> Cầu vượt Quang Trung, Gò Vấp, TP. HCM</p>
            <p><strong>Hotline:</strong> <span>0393331359</span></p>
            <p><strong>Email:</strong> <span>YaMyshop@gmail.com</span></p>
        </div>

        <!-- Thông báo -->
        <?php if ($successMsg): ?>
            <div class="message success"><?= $successMsg ?></div>
        <?php elseif ($errorMsg): ?>
            <div class="message error"><?= $errorMsg ?></div>
        <?php endif; ?>

        <div class="contact-content">
            <form method="POST" action="process_contact.php" class="contact-form">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Họ và tên" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" placeholder="Điện thoại" required>
                </div>
                <div class="form-group">
                    <textarea name="message" rows="6" placeholder="Nội dung" required></textarea>
                </div>
                <button type="submit" class="btn">Gửi thông tin</button>
            </form>

            <div class="contact-map">
            <iframe
                width="600"
                height="450"
                style="border:0"
                loading="lazy"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31770.0!2d106.62778!3d10.85417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sQuang%20Trung%20Software%20City!5e0!3m2!1svi!2s!4v[UNIX_TIMESTAMP]!5m2!1svi!2s">
            </iframe>
            
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layout/footer.php"; ?>

</body>
</html>
