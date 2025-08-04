<?php
require_once __DIR__ . '/../../config/db.php';
$db = new Database();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Xử lý ảnh
    $imageName = $_FILES['image']['name'];
    $imageTmp  = $_FILES['image']['tmp_name'];
    $imageError = $_FILES['image']['error'];

    // Đường dẫn thư mục lưu ảnh
    $uploadDir = __DIR__ . '/../../public/images/';
    $imagePath = '';

    if ($imageError === 0) {
        // Tạo tên file không trùng
        $imagePath = uniqid() . '_' . basename($imageName);
        $destination = $uploadDir . $imagePath;

        // Di chuyển file
        if (move_uploaded_file($imageTmp, $destination)) {
            // Thêm dữ liệu vào DB
            $stmt = $conn->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sds", $name, $price, $imagePath);
            $stmt->execute();
            $stmt->close();

            header("Location: products.php");
            exit;
        } else {
            echo "<p style='color:red;'>Không thể lưu ảnh lên máy chủ.</p>";
        }
    } else {
        echo "<p style='color:red;'>Lỗi khi chọn ảnh.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .back-link a {
            text-decoration: none;
            color: #007bff;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Thêm sản phẩm</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" required>

        <label for="price">Giá:</label>
        <input type="number" name="price" required>

        <label for="image">Ảnh sản phẩm:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Thêm</button>
    </form>

    <div class="back-link">
        <a href="products.php">← Quay lại danh sách sản phẩm</a>
    </div>
</body>
</html>
