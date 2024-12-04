<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        //error handlers
        $errors =[];

        if(is_input_empty($username, $pwd, $email, $surname, $birthday)) {
        $errors["empty_input"] = "Fill in all fields!";
        }

        
        require_once 'config_session.inc.php';
        
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
        
            $signupData =[
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;
            header("Location: ../singup.php");
            die();
        }

    } catch (PDOException $e) {
die("Query failed: ". $e->getMessage());
    }
} else {
    header("Location:../index.php");
    die();  
}