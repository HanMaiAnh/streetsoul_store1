<?php
include_once __DIR__ . "/../../config/db.php";
include_once __DIR__ . "/../../model/product.model.php";
include_once __DIR__ . "/../../model/category.model.php";
include_once __DIR__ . "/../layout/header.php";

$productModel = new Product();
$categoryModel = new Category();

$categoryId = isset($_GET['category_id']) ? intval($_GET['category_id']) : null;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 6;
$offset = ($page - 1) * $limit;

if ($categoryId) {
    $totalProducts = $productModel->countProductsByCategory($categoryId);
    $allProducts = $productModel->getProductsByCategoryPaginated($categoryId, $limit, $offset);
    $categoryName = $categoryModel->getCategoryNameById($categoryId);
} else {
    $totalProducts = $productModel->countAllProducts();
    $allProducts = $productModel->getAllProductsPaginated($limit, $offset);
    $categoryName = null;
}

$totalPages = ceil($totalProducts / $limit);
$allCategories = $categoryModel->getAllCategories();
?>

<!-- CSS Hover cho danh mục -->
<style>

    .category-wrapper {
        position: relative;
    }


    .category-wrapper:hover .category-list {
        max-height: 500px;
    }

    .category-list li a {
        display: block;
        padding: 6px 12px;
        border-radius: 6px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .category-list li a:hover {
        background-color: #e6f0ff;
        color: #0056b3;
    }
</style>


<div class="container" style="display: flex; gap: 30px; flex-wrap: wrap; padding: 20px;">
    <!-- Sidebar -->
    <aside class="category-wrapper" style="flex: 1 1 20%; padding: 20px; background-color: #f9f9f9; border-radius: 10px;">
        <h3 style="margin-bottom: 15px; color: #333;">Danh mục</h3>
        <ul class="category-list" style="list-style: none; padding-left: 0; font-size: 16px; margin: 0;">
            <?php if (!empty($allCategories)): ?>
                <?php foreach ($allCategories as $category): ?>
                    <li style="margin-bottom: 10px;">
                        <a href="?category_id=<?php echo $category['id']; ?>" 
                           style="text-decoration: none; color: #007BFF; font-weight: 500;">
                            <?php echo htmlspecialchars($category['name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Không có danh mục</li>
            <?php endif; ?>
        </ul>
    </aside>

    <!-- Sản phẩm + phân trang -->
    <section style="flex: 1 1 75%;">
        <h2 style="margin-bottom: 20px;">
            <?php echo $categoryName ? "Sản phẩm thuộc danh mục: <em>$categoryName</em>" : "Tất cả sản phẩm"; ?>
        </h2>

    <div class="product-list" style="display: flex; flex-wrap: wrap; gap: 20px;">
<?php if (!empty($allProducts)): ?>
        <?php foreach ($allProducts as $product): ?>
            <div class="product" style="flex: 1 1 calc(33.333% - 20px); box-shadow: 0 0 10px #ccc; border-radius: 10px; padding: 10px;">
                <a href="productDetail.php?id=<?php echo $product['id']; ?>" style="text-decoration: none; color: inherit;">
                    <img src="/streetsoul_store1/public/images/<?php echo $product['image']; ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                         style="width: 100%; height: 200px; object-fit: contain; border-radius: 8px;">
                    <h3 style="font-size: 16px; margin: 10px 0;"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="price" style="color:rgb(0, 0, 0); font-weight: bold;"><?php echo number_format($product['price']); ?> VNĐ</p>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không có sản phẩm nào trong danh mục này.</p>
    <?php endif; ?>
</div>

        <!-- Phân trang -->
        <div style="width: 100%; text-align: center; margin-top: 30px;">
            <?php for ($i = 1; $i <= min($totalPages, 3); $i++): ?>
                <a href="?<?php echo $categoryId ? "category_id=$categoryId&" : ""; ?>page=<?php echo $i; ?>"
                   style="display: inline-block; margin: 0 5px; padding: 8px 14px; background: <?php echo $i == $page ? '#007BFF' : '#ddd'; ?>; 
                          color: #fff; text-decoration: none; border-radius: 6px;">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    </section>
</div>

<?php include_once __DIR__ . "/../layout/footer.php"; ?>
