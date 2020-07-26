<?php
    include_once '../DB-Changes/Functions/fct_sqlconnect.php';

    $username = $_POST['username'];

    $sql = "SELECT Username FROM nutzer";
    $handle = fill_statement($sql, array());
    $handle->execute();

    $username_existing = false;

    while($zeile = $handle->fetch(PDO::FETCH_OBJ))
    {
        if($username == $zeile->Username)
        {
            $username_existing = true;
        }
    }

    if(!$username_existing)         //Errorcodes:
    {                               //0 Kein Fehler
        echo "0";                   //1 Username vorhanden
    }
    else
    {
        echo "1";
    }

?>