<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include 'top-header.php';
    include 'config/config.php';

    ?>
    <title>Home</title>
</head>

<body>
    <?php
    include 'header.php';
    include 'sliding-checkout/sliding-checkout.php';
    include 'sliding-images/sliding-images.php';
    include 'categories-catalog/categories-catalog.php';
    include 'categories/category-display.php';
    include 'products-catalog/products-catalog.php';
    include 'footer.php';
    include 'sub-footer.php';
    ?>
</body>

</html>