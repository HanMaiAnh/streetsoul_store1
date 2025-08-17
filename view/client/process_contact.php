<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars($_POST['name'] ?? '');
    $email   = htmlspecialchars($_POST['email'] ?? '');
    $phone   = htmlspecialchars($_POST['phone'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    try {
        // 1️⃣ Gửi mail tới YamyShop (admin)
        $mailToShop = new PHPMailer(true);
        $mailToShop->isSMTP();
        $mailToShop->Host       = 'smtp.gmail.com';
        $mailToShop->SMTPAuth   = true;
        $mailToShop->Username   = 'YaMyshop2323@gmail.com';
        $mailToShop->Password   = 'xwsm emsd eucv luqt  ';  // App Password
        $mailToShop->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mailToShop->Port       = 587;

        $mailToShop->setFrom('YaMyshop2323@gmail.com', 'YaMy Support');
        $mailToShop->addAddress('YaMyshop2323@gmail.com'); // 📨 Admin sẽ nhận ở Inbox

        $mailToShop->Subject = 'Khách hàng liên hệ từ website YaMy';
        $mailToShop->Body    = 
            "Bạn nhận được tin nhắn từ khách hàng:

            Họ tên: {$name}
            Email: {$email}
            Số điện thoại: {$phone}
            -----------------------------------
            Nội dung:
            {$message}
            -----------------------------------
            Gửi từ website YaMy.";

        $mailToShop->send();

        // 2️⃣ Gửi mail phản hồi cho khách hàng
        if (!empty($email)) {
            $mailToCustomer = new PHPMailer(true);
            $mailToCustomer->isSMTP();
            $mailToCustomer->Host       = 'smtp.gmail.com';
            $mailToCustomer->SMTPAuth   = true;
            $mailToCustomer->Username   = 'YaMyshop2323@gmail.com';
            $mailToCustomer->Password   = 'wqjk ycyb ecqz hbhs';
            $mailToCustomer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mailToCustomer->Port       = 587;

            $mailToCustomer->setFrom('YaMyshop2323@gmail.com', 'YaMy Support');
            $mailToCustomer->addAddress($email, $name);

            $mailToCustomer->Subject = 'YaMy Shop đã nhận thông tin của bạn';
            $mailToCustomer->Body    = 
                "Xin chào {$name},

                Cảm ơn bạn đã liên hệ với YaMy Shop.
                Chúng tôi đã nhận được thông tin của bạn và sẽ phản hồi trong thời gian sớm nhất.

                Thông tin bạn gửi:
                - Họ tên: {$name}
                - Email: {$email}
                - Số điện thoại: {$phone}
                - Nội dung: {$message}

                Trân trọng,
                Đội ngũ YaMy Shop.";

            $mailToCustomer->send();
        }

        $_SESSION['successMsg'] = "🎉 Gửi liên hệ thành công! Thông tin đã được chuyển tới YaMy Shop.";
    } catch (Exception $e) {
        $_SESSION['errorMsg'] = "❌ Có lỗi xảy ra khi gửi email: {$e->getMessage()}";
    }

    header("Location: contact.php");
    exit();
} else {
    header("Location: contact.php");
    exit();
}
