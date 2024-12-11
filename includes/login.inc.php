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

        if(is_input_empty($pwd, $email)) {
        $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_email($pdo,$email);
        
        if (is_email_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect email info";
        }

        if (!is_email_wrong($result) && is_password_wrong($pwd,$result["pass"])) {
            $errors["email_incorrect"] = "Incorrect email or password!";
        }
        
        require_once 'config_session.inc.php';
        
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            header("Location: ../index.php");
            exit;       
         }

        $newSessionId = session_create_id();
        $newSessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_email"] = htmlspecialchars($result["email1"]);
        $_SESSION["username"] = $result["username"];
        
        $_SESSION["last_regeneration"] = time();
        header("Location:../home.php");
$pdo = null;
$statement = null;

die();

    } catch (PDOException $e) {
die("Query failed: ". $e->getMessage());
    }
} else {
    header("Location:../home.php");
    die();  
}