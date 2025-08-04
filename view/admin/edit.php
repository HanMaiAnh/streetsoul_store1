<?php
require_once __DIR__ . '/../../config/db.php';
$db = new Database();
$conn = $db->conn;

// Lấy ID từ URL
$id = $_GET['id'];

// Lấy sản phẩm hiện tại
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $imagePath = $product['image']; // Giữ ảnh cũ mặc định

    // Kiểm tra xem có chọn ảnh mới không
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageName = $_FILES['image']['name'];
        $imageTmp  = $_FILES['image']['tmp_name'];
        $targetDir = __DIR__ . '/../../public/images/';
        $newImagePath = uniqid() . '_' . basename($imageName);

        if (move_uploaded_file($imageTmp, $targetDir . $newImagePath)) {
            $imagePath = $newImagePath; // Gán ảnh mới vào DB

            // Xoá ảnh cũ nếu tồn tại
            if (!empty($product['image']) && file_exists($targetDir . $product['image'])) {
                unlink($targetDir . $product['image']);
            }
        } else {
            echo "<p style='color:red;'>Không thể tải ảnh mới.</p>";
        }
    }

    // Cập nhật dữ liệu
    $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, image = ? WHERE id = ?");
    $stmt->bind_param("sdsi", $name, $price, $imagePath, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: products.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
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

        img {
            max-width: 150px;
            margin-top: 10px;
            border-radius: 4px;
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
        .form-footer {
    text-align: center;
    margin-top: 30px;
}

    </style>
</head>
<body>
    <h2>Sửa sản phẩm</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>

        <label for="price">Giá:</label>
        <input type="number" name="price" value="<?= $product['price'] ?>" required>

        <label for="image">Ảnh mới:</label>
        <input type="file" name="image" accept="image/*">

        <label>Ảnh hiện tại:</label>
        <img src="/streetsoul_store1/public/images/<?= htmlspecialchars($product['image']) ?>" alt="Ảnh sản phẩm hiện tại">

        <div class="form-footer">
    <button type="submit">Lưu</button>
</div>
    </form>

    <div class="back-link">
        <a href="products.php"> Quay lại danh sách sản phẩm</a>
    </div>
</body>
</html>
