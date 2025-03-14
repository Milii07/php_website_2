<?php

declare(strict_types=1);

function getArticleByUser(object $pdo, string $user_id)
{
    $query = "SELECT * FROM articles WHERE user_id = :uid;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":uid", $user_id);
    $stmt->execute();
    
    $res = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $res[] = $row;
    }
    return $res;
}

function getAllArticles(object $pdo){
    $query = "SELECT * FROM articles";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $res = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $res[] = $row;
    }   
    return $res;
}

function getSingleArticle(object $pdo,$id){
    $query = "SELECT articles.*,articles_categories.category_id 
    FROM articles left join articles_categories on articles_categories.articles_id = articles.id WHERE id=:aid";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":aid", $id);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getArticleAuthor(object $pdo,$user_id){
    $query = "SELECT * FROM users where id = :u";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":u", $user_id);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    return $res;
}


function getArticlesByCategory($pdo, $category_id) {
    $sql = "SELECT * FROM articles WHERE category_id = :category_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>