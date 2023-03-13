<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../top-header.php';
    include '../config/config.php';
    ?>
    <title>Products</title>
</head>

<body>
    <?php
    include '../header.php';
    include '../sliding-checkout/sliding-checkout.php';
    include '../categories-catalog/categories-catalog.php';
    ?>

    <?php
    include "products-catalog/product.php";
    include '../footer.php';
    include '../sub-footer.php';
    ?>
</body>

</html>