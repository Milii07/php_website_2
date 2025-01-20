<?php
 try {
    require_once 'dbh.inc.php';
    require_once 'articles_model.inc.php';
    require_once 'config_session.inc.php';


   if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $user_id = $_SESSION['username'];
        $content = $_POST['content'];

        
        $stmt = $pdo->prepare("INSERT INTO articles (title, subtitle, user_id, content) VALUES (?,?,?,?)");
        $stmt->bindValue(1, $title);
        $stmt->bindValue(2, $subtitle);
        $stmt->bindValue(3, (int) $user_id);
        $stmt->bindValue(4, $content);
        $stmt->execute();

        header("location: ../home.php");

    }

 
    
 } catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());
}

?>