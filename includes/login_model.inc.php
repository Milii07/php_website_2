<?php

declare(strict_types=1);

function get_email(object $pdo, string $email)
{
    $query = "SELECT * FROM users WHERE email1 = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}