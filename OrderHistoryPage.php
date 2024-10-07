<?php
session_start();
include 'db_conn.php'; // Kết nối MySQLi

// Truy vấn lịch sử mua hàng từ bảng order_items
$sql = "SELECT oi.order_id, p.NAME, oi.buy_qty, oi.price, oi.buy_qty * oi.price AS total_price
        FROM order_items oi 
        JOIN products p ON oi.product_id = p.id 
        ORDER BY oi.order_id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Mua Hàng</title>
    <link rel="stylesheet" href="./css/order_history.css">
</head>
<body>

<div class="container">
    <h1>Lịch Sử Mua Hàng</h1>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
                <th>Ngày mua</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['NAME']; ?></td>
                        <td><?php echo $row['buy_qty']; ?></td>
                        <td><?php echo number_format($row['total_price'], 2); ?> VND</td>
                        <td><?php echo date('Y-m-d'); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>Không có lịch sử mua hàng.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
