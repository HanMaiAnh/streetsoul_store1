<?php include_once __DIR__ . "/../layout/header.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Liên hệ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding-top: 10px; /* Đẩy nội dung xuống để tránh bị che */
        }

        .contact-container {
            max-width: 1400px;
            margin: 50px auto;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .contact-inner {
            width: 100%;
            max-width: 960px; /* 2/3 màn hình */
        }

        .contact-info {
            text-align: left;
            margin-bottom: 30px;
        }

        .contact-info h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .contact-info p {
            font-size: 16px;
            margin: 8px 0;
        }

        .contact-info strong {
            font-weight: 600;
        }

        .contact-info span {
            color: #c00;
            font-weight: 500;
        }

        .contact-content {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .contact-form, .contact-map {
            flex: 1;
            min-width: 350px;
        }

        .contact-form {
            background: #f9f9f9;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        }

        .form-group {
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ff6600;
            border-radius: 8px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        .btn {
            background-color: #000;
            color: white;
            font-size: 18px;
            padding: 12px 24px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #333;
        }

        .contact-map {
            text-align: center;
        }

        .contact-map iframe {
            width: 100%;
            height: 100%;
            min-height: 500px;
            border-radius: 14px;
            border: none;
        }

        @media (max-width: 992px) {
            .contact-content {
                flex-direction: column;
            }

            .contact-map iframe {
                min-height: 400px;
            }
        }
    </style>
</head>
<body>

<div class="contact-container">
    <div class="contact-inner">
        <!-- Thông tin liên hệ -->
        <div class="contact-info">
            <h2>Ý KIẾN CỦA BẠN VỀ YaMy</h2>
            <p><strong>Địa chỉ:</strong> Cầu vượt Quang Trung, Gò Vấp, TP. HCM</p>
            <p><strong>Hotline:</strong> <span>0393331359</span></p>
            <p><strong>Email:</strong> <span>YaMyshop@gmail.com</span></p>
        </div>

        <!-- Nội dung chính -->
        <div class="contact-content">
            <!-- Form -->
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

            <!-- Bản đồ -->
            <div class="contact-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1301243483355!2d106.68212107591965!3d10.800439258733595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529358e82661b%3A0xd72e63be9cd6fcce!2zNDcgVHLhuqduIFF1YW5nIMSQaeG7gW8sIFBoxrDhu51uZyAxNCwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVMOibiBI4buTIENow60!5e0!3m2!1svi!2s!4v1722288000000!5m2!1svi!2s"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
</body>
</html>