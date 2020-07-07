<?php
    include_once 'DB-Changes/Functions/fct_sqlconnect.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO nutzer (Username, Email, Password, Rechteklasse) VALUES (?, ?, ?, 1)";
    $handle = fill_statement($sql, array($username, $email, $password));
    $handle->execute();

    header("Location: login.html");
?>