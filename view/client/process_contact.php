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
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'YaMyshop2323@gmail.com';
        $mail->Password   = 'qyqm vjpt szyb tvlr'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('YaMyshop2323@gmail.com', 'YaMy Support');
        $mail->addAddress('nguyenchihieu12a@gmail.com');

        $mail->Subject = 'Lien He Khach Hang Tu YaMy';
        $mail->Body    = "Tên: {$name}\nEmail: {$email}\nĐiện thoại: {$phone}\nNội dung: {$message}";

        if ($mail->send()) {
            $_SESSION['successMsg'] = "🎉 Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm nhất.";
        } else {
            $_SESSION['errorMsg'] = "⚠️ Không thể gửi email. Vui lòng thử lại.";
        }
    } catch (Exception $e) {
        $_SESSION['errorMsg'] = "❌ Có lỗi xảy ra khi gửi email: {$mail->ErrorInfo}";
    }

    // Quay lại contact.php
    header("Location: contact.php");
    exit();
} else {
    header("Location: contact.php");
    exit();
}
