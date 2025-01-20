<?php
try {
    require_once 'dbh.inc.php';
    require_once 'category_model.inc.php';

    $allCategories =  getCategoriesByUser($pdo,$_SESSION['user_id']); 
} catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());
 }

?>