<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';
include_once 'categories.inc.php';

$category_id = $_GET['category_id'];
if(isset($category_id)){
    deleteCategory($pdo,$category_id);

    header("Location:../list_categories.php");
}
?>