<?php
 try {
    require_once 'dbh.inc.php';
    require_once 'articles_model.inc.php';
    require_once 'config_session.inc.php';


   if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = $_POST['title'];
      $cat_id = $_POST['cat_id'];
        
        $stmt = $pdo->prepare("UPDATE categories set title = ?  where id = ?");
        $stmt->bindValue(1, $title);
        $stmt->bindValue(2, $cat_id);
        $stmt->execute();

        header("location: ../list_categories.php");

    }

 
    
 } catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());
}

?>