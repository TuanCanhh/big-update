<?php
session_start();
include 'db_conn.php'; // Kết nối MySQLi

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý thêm sản phẩm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['qty'])) {
    $product_id = $_POST['id'];
    $quantity = intval($_POST['qty']); // Chuyển đổi sang số nguyên

    // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity; // Tăng số lượng
    } else {
        $_SESSION['cart'][$product_id] = $quantity; // Thêm sản phẩm mới
    }

    // Chuyển hướng về trang sản phẩm sau khi thêm
    header("Location: CartPage.php");
    exit();
}

// Truy vấn tất cả sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC); // Lấy tất cả kết quả dưới dạng mảng kết hợp
} else {
    $products = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="./css/product.css">
</head>
<body>

<div class="container">
    <h1>Danh Sách Sản Phẩm</h1>
    <a href="CartPage.php">cart</a>
    <div class="product-list">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h2><?php echo $product['NAME']; ?></h2>
                    <p>Giá: <?php echo number_format($product['price']); ?> VND</p>
                    <p><?php echo $product['description']; ?></p>

                    <!-- Form thêm sản phẩm vào giỏ hàng -->
                    <form action="ProductPage.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" id="quantity" name="qty" value="1" min="1">
                        <button type="submit">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm nào.</p>
        <?php endif; ?>
    </div>

</div>

</body>
</html>
