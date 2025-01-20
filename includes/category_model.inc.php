<?php

declare(strict_types=1);

function getCategoriesByUser(object $pdo, string $user_id)
{
    $query = "SELECT * FROM categories WHERE user_id = :uid;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":uid", $user_id);
    $stmt->execute();
    
    $res = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $res[] = $row;
    }
    return $res;
}

function getAllbyCategories(object $pdo, $id) {
   
    $query = "SELECT articles.title, articles.id,articles.subtitle, articles.user_id, articles.content 
              FROM articles_categories 
              INNER JOIN articles ON articles_categories.articles_id = articles.id 
              WHERE articles_categories.category_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $res = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[] = $row;
    }
    return $res;
}
?>