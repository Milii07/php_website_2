<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = md5($_POST["pwd"]);
    $email = $_POST["email"];
    $surname = $_POST["surname"];
    $birthday = $_POST["birthday"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //error handlers
        $errors = [];

        if (is_input_empty($username, $pwd, $email, $surname, $birthday)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_registred($pdo, $email)) {
            $errors["email_used"] = "Email already registred!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;
            header("Location: ../singup.php");
            die();
        }

        $userid = create_users($pdo, $pwd, $username, $email, $birthday, $surname);
        $newSessionId = session_create_id();
        $newSessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $userid;
        $_SESSION["user_email"] = $email;
        $_SESSION["username"] = $username;

        $_SESSION["last_regeneration"] = time();
        header("Location:../home.php");

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location:../singup.php");
    die();
}