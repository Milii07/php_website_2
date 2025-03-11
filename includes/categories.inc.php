<?php
try {
    require_once 'dbh.inc.php';
    require_once 'category_model.inc.php';


    // if(!isset($_SESSION['user_id'])){
    //     header("location: index.php");
    //     die();
    // }

    if(isset($_SESSION['user_id'])){
        $allCategories =  getCategoriesByUser($pdo,$_SESSION['user_id']); 

    } else {
        $allCategories =  getAllCategories($pdo); 

    }


} catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());

 }

?>