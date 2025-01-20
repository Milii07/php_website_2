<?php
 try {
    require_once 'dbh.inc.php';
    require_once 'articles_model.inc.php';

    $allArticles =  getAllArticles($pdo);
    
 } catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());
 }

?>