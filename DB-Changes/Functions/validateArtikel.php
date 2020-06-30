<?php
    include_once 'fct_sqlconnect.php';
    $name_unescaped = $_GET['name'];
    $picturelink_unescaped = $_GET['picturelink'];
    $edit = $_GET['edit'];
    $pk_artikel = $_GET['pk_artikel'];
    //Hole alle aktuellen Daten
    $sql = "SELECT PK_Artikel, Name, Bildlink FROM artikel";
    $handle = fill_statement($sql, array());
    $handle->execute();

    //Überprüfung ob Artikel oder Bild schon existiert
    $picturelink_exists = false;
    $name_exists = false;
    return 1;
    while ($zeile = $handle->fetch(PDO::FETCH_OBJ))
    {
        if($edit)
        {
            //Hier darf der Artikel nicht mit sich selbst verglichen werden
            if($zeile->PK_Artikel != $pk_artikel)
            {
                if($name_unescaped==$zeile->Name)
                {
                    $name_exists = true;
                }
                if($picturelink_unescaped==$zeile->Bildlink)
                {
                    $picturelink_exists = true;
                }
            }
        }
        else
        {
            if($name_unescaped==$zeile->Name)
            {
                $name_exists = true;
            }
            if($picturelink_unescaped==$zeile->Bildlink)
            {
                $picturelink_exists = true;
            }
        }
    }

    if($name_exists && $picturelink_exists)             //Errorcodes:
    {                                                   //0     Kein Fehler
        echo "1";                                       //1     Artikelname und Bild schon vorhanden
    }                                                   //2     Artikelname schon vorhanden
    else if($name_exists)                               //3     Bild schon vorhanden
    {
        echo "2";
    }                                                    
    else if($picturelink_exists)
    {
        echo "3";
    }
    else
    {
        echo "0";
    }
?>