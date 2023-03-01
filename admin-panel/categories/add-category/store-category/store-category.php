<?php
function checkInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryname = checkInput($_POST['category_name']);
    $hasSubCategory = $_POST['has_sub_category'];
    $parentCategory = $_POST['parent_category'];

    include '../../../../config/config.php';

    date_default_timezone_set("Asia/Kolkata");
    $categoryaddedon = date("Y-M-d h:i:sa");
    $hassubcategory = $hasSubCategory == 1 ? true : false;
    echo $categoryaddedon;
    echo $hassubcategory;
    $sql = "insert into add_cateogry(category_id, category_name, added_on, hasSubCategory, hasParentCategory) values ('$categoryid', '$categoryname', '$categoryaddedon', '$hassubcategory', '$hasparentcategory')";
}
