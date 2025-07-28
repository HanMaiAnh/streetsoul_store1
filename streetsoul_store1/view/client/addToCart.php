<?php
session_start();
include_once __DIR__ . "/../../model/product.model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']) ?: 1;

    $productModel = new Product();
    $product = $productModel->getProductById($productId);

    if ($product) {
        $item = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'quantity' => $quantity,
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['id'] == $productId) {
                $cartItem['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        unset($cartItem);

        if (!$found) {
            $_SESSION['cart'][] = $item;
        }
    }
}

header("Location: index.php?page=cart"); // hoặc quay lại trang trước
exit();
