<?php
    include_once '../DB-Changes/Functions/fct_sqlconnect.php';

    function new_User($username, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO nutzer (Username, Email, Password, Rechteklasse) VALUES (?, ?, ?, 0)";
        $handle = fill_statement($sql, array($username, $email, $password));
        $handle->execute();
    }

    function validate_Password($username, $password)
    {   
        if(username_Exists($username))
        {   
            $sql = "SELECT Password FROM nutzer WHERE Username = ?";
            $handle = fill_statement($sql, array($username));
            $handle->execute();
            $zeile = $handle->fetch(PDO::FETCH_OBJ);
            return password_verify($password, $zeile->Password);
        }
        return false;
    }

    function username_Exists($username)
    {
        $sql = "SELECT Username FROM nutzer";
        $handle = fill_statement($sql, array());
        $handle->execute();

        $username_exists = false;
        while($zeile = $handle->fetch(PDO::FETCH_OBJ))
        {
            if($username == $zeile->Username)
            {
                $username_exists = true;
            }
        }
        return $username_exists;
    }

    function get_Rechteklasse($username)
    {
        $sql = "SELECT Rechteklasse FROM nutzer WHERE Username = ?";
        $handle = fill_statement($sql, array($username));
        $handle->execute();
        $zeile = $handle->fetch(PDO::FETCH_OBJ);

        return $zeile->Rechteklasse;

    }

    function change_Password($username, $password)
    {
        $sql = "UPDATE nutzer SET Password = ? WHERE Username = ?";
        $handle = fill_statement($sql, array($password, $username));
        $handle->execute();
    }

    function getUserID($username)
    {
        $sql = "SELECT PK_Nutzer FROM nutzer WHERE Username = ?";
        $handle = fill_statement($sql, array($username));
        $handle->execute();
        $zeile = $handle->fetch(PDO::FETCH_OBJ);
        return $zeile->PK_Nutzer;
    }


?>