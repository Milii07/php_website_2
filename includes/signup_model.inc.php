<?php
declare(strict_types=1);

function get_username(object $pdo, string $username)
{
$query = "SELECT username FROM users WHERE username = :username;";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username", $username);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}

function get_surname(object $pdo, string $surname)
{
$query = "SELECT surname FROM users WHERE surname = :surname;";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":surname", $surname);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}

function get_birthdy(object $pdo, string $birthday)
{
$query = "SELECT birthday FROM users WHERE  birthday = :birthday;";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":birthday", $birthday);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}





function get_email(object $pdo, string $email)
{
$query = "SELECT username FROM users WHERE email1 = :email;";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":email", $email);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}
 function set_users(object $pdo, string $pwd, string $username, string $email ,string $birthday, string $surname)
 {
    $query = "INSERT INTO users (username, pass, email1, birthday1)
    VALUES (:usernames, :pwd, :email, :birthday);";
    $stmt = $pdo->prepare($query);
$options = [
    'cost'=> 12
];
$hashedPwd = password_hash($pwd, PASSWORD_BCRYPT,
$options);

    $stmt->bindParam(":usernames", $username);
    $stmt->bindParam(":pwd", $pwd);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":birthday", $birthday);
    $stmt->execute(); 
}