<?php
session_start(); 
require_once 'includes/dbh.inc.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_comment'])) {
    if (!isset($_SESSION['user_id'])) {
        echo "<p style='color: red;'>You must be logged in to comment.</p>";
        exit();
    }

    $user_id = $_SESSION['user_id']; 
    $article_id = $_POST['article_id'];
    $comment_text = trim($_POST['comment_text']);

    if (!empty($comment_text)) {
        $stmt = $pdo->prepare("INSERT INTO comments (user_id, article_id, comment_text) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $article_id, $comment_text]);

        header("Location: product.php?article_id=" . $article_id . "&success=1");
        exit();
    } else {
        echo "<p style='color: red;'>Comment cannot be empty!</p>";
    }
}
?>

