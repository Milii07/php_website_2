<?php
 try {
    require_once 'dbh.inc.php';
    require_once 'config_session.inc.php';


   if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = $_POST['title'];
        $user_id = $_SESSION['user_id'];

        
        $check = selectCategoriesByTitle($pdo,$title);

        if($check){
            $_SESSION['error_creating_category'][] = 'Already exists';
            header("location: ../create_category.php");
        } else {
            $stmt = $pdo->prepare("INSERT INTO categories (title, user_id) VALUES (?,?)");
            $stmt->bindValue(1, $title);
            $stmt->bindValue(2, (int) $user_id);
            $stmt->execute();
    
           
            header("location: ../list_categories.php");
        }

    }

 
    
 } catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());
}

function selectCategoriesByTitle($pdo,string $title)
{
    $query = "SELECT * FROM categories WHERE title = :title;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->execute();

   return $stmt->fetch(PDO::FETCH_ASSOC);

}    
?>