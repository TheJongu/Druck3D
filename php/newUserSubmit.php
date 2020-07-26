<?php
    header("Location: login.php");
    include_once '../DB-Changes/Functions/fct_User.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    new_User($username, $email, $password);
?>