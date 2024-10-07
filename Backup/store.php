<?php
include 'db.php'; // Include the database connection

// // Check if 'category_id' is provided in the URL
// if (!isset($_GET['category_id']) || empty($_GET['category_id'])) {
//     echo "No category selected!";
//     exit;
// }

$category_id = intval($_GET['category_id']); // Sanitize input

// Fetch products from the selected category
$stmt = $pdo->prepare("SELECT * FROM Products WHERE category_id = ?");
$stmt->execute([$category_id]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch category name for display
$category_stmt = $pdo->prepare("SELECT name FROM Categories WHERE id = ?");
$category_stmt->execute([$category_id]);
$category_name = $category_stmt->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products in <?php echo htmlspecialchars($category_name); ?> - Bronx Luggage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Background Image -->
    <div class="background-image"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Bronx Luggage</a>
        </div>
    </nav>

    <!-- Products in Category -->
    <div class="container mt-4">
        <h2>Products in <?php echo htmlspecialchars($category_name); ?></h2>
        <div class="row">
            <?php if (empty($products)): ?>
                <p>No products found in this category.</p>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card product-card" style="background-image: url('<?php echo htmlspecialchars($product['thumbnail']); ?>');">
                        <div class="card-body text-black">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text">$<?php echo number_format($product['price'], 2); ?></p>
                            <p class="card-text">In Stock: <?php echo htmlspecialchars($product['qty']); ?></p>
                            <a href="product.php?id=<?php echo urlencode($product['id']); ?>" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
