<?php
 try {
    require_once 'dbh.inc.php';
    require_once 'articles_model.inc.php';
    require_once 'config_session.inc.php';


   if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $content = $_POST['content'];
        $article_id = $_POST['article_id'];
        $category_id = $_POST['category'];

        $stmt = $pdo->prepare("UPDATE articles set title = ?, subtitle = ?, content = ? where id = ?");
        $stmt->bindValue(1, $title);
        $stmt->bindValue(2, $subtitle);
        $stmt->bindValue(3, $content);
        $stmt->bindValue(4, $article_id);
        $stmt->execute();

        $stmt = $pdo->prepare("SELECT category_id FROM articles_categories WHERE articles_id = ?");
        $stmt->bindValue(1, $article_id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

         if(!$data){
            $stmt = $pdo->prepare("INSERT INTO articles_categories VALUES(?,?)");
            $stmt->bindValue(1, $article_id);
            $stmt->bindValue(2, $category_id);
            $stmt->execute();
         } else {
            $stmt = $pdo->prepare("UPDATE articles_categories set category_id = ? where articles_id = ?");
            $stmt->bindValue(1, $category_id);
            $stmt->bindValue(2, $article_id);
            $stmt->execute();
    
         }

        header("location: ../home.php");

    }

 
    

 } catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());
}

?>