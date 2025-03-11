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



function getAllCategories(object $pdo)
{
    $query = "SELECT * FROM categories";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $res = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $res[] = $row;
    }
    return $res;
}




function getCategoryInfo(object $pdo, string $cat_id)
{
    $query = "SELECT * FROM categories WHERE id = :uid;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":uid", $cat_id);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
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

function getAllbyCategoriesAndUser(object $pdo, $id,$user_id) {
   
    $query = "SELECT articles.title, articles.id,articles.subtitle, articles.user_id, articles.content 
              FROM articles_categories 
              INNER JOIN articles ON articles_categories.articles_id = articles.id 
              WHERE articles_categories.category_id = :id AND articles.user_id = :u_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':u_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $res = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[] = $row;
    }
    return $res;
}


function deleteCategory(object $pdo,$id){
    $query = "DELETE from categories where id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
?>