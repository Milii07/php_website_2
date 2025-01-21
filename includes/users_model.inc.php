<?php

declare(strict_types=1);

function getAllUsers(object $pdo){
    $query = "SELECT * FROM users";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $res = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $res[] = $row;
    }   
    return $res;
}

?>