<?php
session_start();
require 'config.php';

if (isset($_GET['afaire']) && $_GET['afaire'] == 'deconnexion') {
    session_destroy();
    header('Location: login.php?error=3');
    exit;
}

if (empty($_POST['login']) || empty($_POST['password'])) {
    header('Location: login.php?error=1');
    exit;
}

$login = $_POST['login'];
$password = $_POST['password'];

if ($login == USERLOGIN && $password == USERPASS) {
    $_SESSION['CONNECT'] = 'OK';
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    header('Location: accueil.php');
    exit;
} else {
    header('Location: login.php?error=2');
    exit;
}
?>