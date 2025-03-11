<?php
require_once 'config_session.inc.php';

session_unset();

session_destroy();


$currentUrl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $currentUrl = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

$currentUrlWithIndex = explode("includes/logout.php",rtrim($currentUrl, '/'))[0] . 'home.php';
header("location: ".$currentUrlWithIndex);

exit();
?>