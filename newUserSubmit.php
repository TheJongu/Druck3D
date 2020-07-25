<?php
    header("Location: login.html");
    include_once 'fct_User.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    new_User($username, $email, $password);
?>