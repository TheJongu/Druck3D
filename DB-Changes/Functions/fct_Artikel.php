<?php
    function insertArtikel($name, $price, $picturelink, $description)
    {
        include_once 'fct_sqlconnect.php';

        error_reporting(0);                                   //unterbindet die PHP-eigenen Fehlermeldungen

        if($db_link->connect_errno)                                     
        {
            die('Hier gibt es wohl grade ein Problem');
        }
        //Eingaben absichern
        $name = $db_link->real_escape_string(trim($name));
        $price = $db_link->real_escape_string(trim($price));
        $picturelink = $db_link->real_escape_string(trim($picturelink));
        $description = $db_link->real_escape_string(trim($description));


        //Einfügen in die DB
        $sqlrequest = "INSERT INTO artikel (PK_Artikel, Name, Preis, Bildlink, Beschreibung) VALUES (NULL, '{$name}', '{$price}', '{$picturelink}', '{$description}');";
        $db_link->query($sqlrequest);
        
        if($db_link->affected_rows == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    
    }

    function deleteArtikel ($pk_artikel)
    {
        include_once 'fct_sqlconnect.php';
        include_once 'fct_ArtikelSchlagworte.php';
        //Sichere den pk_artikel ab
        $pk_artikel = $db_link->real_escape_string(trim($pk_artikel));
        //Prüfe für DB Fehler
        if($db_link->connect_errno)
        {
            die('Hier gibt es wohl grade ein Problem.');
        }
        //Lösche alle Schlagworte für den Artikel
        deleteArtikelSchlagworteForPk_Artikel($pk_artikel);

        //Lösche den Artikel vom Artikeltable
        $sqlrequest = "DELETE FROM artikel WHERE artikel.PK_Artikel = '{$pk_artikel}';";
        $erg = $db_link->query($sqlrequest);

        echo 'Geloeschte Artikel: '.$db_link->affected_rows;
    }

    function editArtikel($pk_artikel, $name, $price, $picturelink, $description)
    {
        include_once 'Functions/fct_sqlconnect.php';
        
        //Eingaben absichern
        $pk_artikel = $db_link->real_escape_string(trim($pk_artikel));
        $name = $db_link->real_escape_string(trim($name));
        $price = $db_link->real_escape_string(trim($price));
        $picturelink = $db_link->real_escape_string(trim($picturelink));
        $description = $db_link->real_escape_string(trim($description));
    
        //Editieren des Artikels
        $sqlrequest = "UPDATE artikel SET Name = '{$name}', Preis = '{$price}', Bildlink = '{$picturelink}', Beschreibung = '{$description}' WHERE artikel.PK_Artikel = {$pk_artikel};";
        $db_link->query($sqlrequest);
        
        if($db_link->affected_rows == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>
    