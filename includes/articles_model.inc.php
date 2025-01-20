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
    $query = "SELECT * FROM articles WHERE id=:aid";
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

function updateArticle(object $pdo,$user_id,$article_id){
    $query = "UPDATE * FROM users where id = :u";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":u", $user_id);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    return $res;
}

?>