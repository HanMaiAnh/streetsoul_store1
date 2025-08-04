<?php
require_once __DIR__ . '/../../config/db.php';
$db = new Database();
$conn = $db->conn;

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
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

        .add-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .add-btn:hover {
            background-color: #218838;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        img {
            width: 50px;
            height: auto;
            border-radius: 4px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            margin: 0 5px;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions {
            white-space: nowrap;
        }
        .btn {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
    color: #fff;
    text-decoration: none;  
    font-size: 14px;
    margin: 2px;
}

.edit-btn {
    background-color: #007bff;
}

.edit-btn:hover {
    background-color: #0056b3;
    text-decoration: none;  
}

.delete-btn {
    background-color: #dc3545;
}

.delete-btn:hover {
    background-color: #a71d2a;
    text-decoration: none;  
}


        
    </style>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>

    <a href="add.php" class="add-btn"> Thêm sản phẩm</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Hot sale</th>
            <th>Ảnh</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= number_format($row['price']) ?> VNĐ</td>
            <td><?= $row['is_hot_sale'] ? '✔️' : '❌' ?></td>
            <td><img src="/streetsoul_store1/public/images/<?= htmlspecialchars($row['image']) ?>" alt="ảnh"></td>
            <td class="actions">
                <a href="edit.php?id=<?= $row['id']  ?>" class="btn edit-btn"> Sửa</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn delete-btn" onclick="return confirm('Xóa sản phẩm?')" > Xóa</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
