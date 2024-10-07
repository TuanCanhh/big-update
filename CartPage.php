<?php
session_start();
include 'db_conn.php'; // Kết nối MySQLi

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    unset($_SESSION['cart'][$product_id]);
}

// Xử lý thanh toán
if (isset($_POST['checkout'])) {
    // Tạo một order_id ngẫu nhiên (hoặc bạn có thể tạo một hệ thống quản lý order_id riêng)
    $order_id = uniqid(); // Hoặc sử dụng ID tự động tăng nếu có

    // Lưu thông tin đơn hàng vào cơ sở dữ liệu
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $sql = "SELECT price FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        
        if ($product) {
            $total_price = $product['price'] * $quantity;
            $insert_order = "INSERT INTO order_items (order_id, product_id, buy_qty, price) VALUES (?, ?, ?, ?)";
            $order_stmt = $conn->prepare($insert_order);
            $order_stmt->bind_param("iiid", $order_id, $product_id, $quantity, $total_price);
            $order_stmt->execute();
        }
    }

    // Sau khi lưu, xóa giỏ hàng
    unset($_SESSION['cart']);
    header("Location: SuccessPage.php"); // Chuyển hướng đến trang thành công
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="./css/cart.css">
</head>
<body>

<div class="container">
    <h1>Giỏ Hàng</h1>

    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalPrice = 0;
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product_id => $quantity) {
                    // Truy vấn thông tin sản phẩm từ cơ sở dữ liệu
                    $sql = "SELECT * FROM products WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $product_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $product = $result->fetch_assoc();
                    
                    if ($product) {
                        $total = $product['price'] * $quantity;
                        $totalPrice += $total;
                        ?>
                        <tr>
                            <td><?php echo $product['NAME']; ?></td>
                            <td><?php echo number_format($product['price']); ?> VND</td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo number_format($total); ?> VND</td>
                            <td><a style=" text-decoration: none; color: red" href="CartPage.php?remove=<?php echo $product_id; ?>">Xóa</a></td>
                        </tr>
                        <?php
                    }
                }
            } else {
                echo "<tr><td colspan='5'>Giỏ hàng rỗng.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="total-price">
        <h3>Tổng cộng: <?php echo number_format($totalPrice); ?> VND</h3>
    </div>

    <?php if (!empty($_SESSION['cart'])): ?>
        <form action="CartPage.php" method="POST">
            <button type="submit" name="checkout">Thanh toán</button>
    <?php endif; ?>
            <button type="submit" name="checkout"><a style=" text-decoration: none; color: white; margin-top: 10px" href="index.php">Back</a></button>
        </form>

</div>

</body>
</html>
