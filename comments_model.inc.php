<?php
function getArticleComments($pdo, $article_id) {
    $stmt = $pdo->prepare("SELECT comments.*, users.username FROM comments 
                           JOIN users ON comments.user_id = users.id 
                           WHERE article_id = ? ORDER BY created_at DESC");
    $stmt->execute([$article_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
