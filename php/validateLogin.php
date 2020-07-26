<?php
    include_once '../DB-Changes/Functions/fct_User.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_exists = username_Exists($username);
    $password_check = validate_Password($username, $password);

    if($username_exists && $password_check) //Errorcodes
    {                                       //0 Kein Fehler
        echo "0";                           //1 Username existiert nicht
    }                                       //2 Passwort falsch
    else if(!$username_exists)
    {
        echo "1";
    }
    else if($username_exists && !$password_check)
    {
        echo "2";
    }
?>