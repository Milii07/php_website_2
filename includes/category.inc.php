<?php
 try {
    require_once 'dbh.inc.php';
    require_once 'category_model.inc.php';

    $allArticlesByCategory = [];

    if(isset($_REQUEST['id'])){
        $allArticlesByCategory =  getAllbyCategories($pdo,$_REQUEST['id']);

    }

    } catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());
}

?>