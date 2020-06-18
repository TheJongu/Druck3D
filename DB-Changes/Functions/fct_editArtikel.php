<?php
    function insertArtikel($name, $price, $picturelink, $description)
    {
        include_once 'fct_sqlconnect.php';

        //error_reporting(0);                                   //unterbindet die PHP-eigenen Fehlermeldungen
        $test = false;

        if($db_link->connect_errno)                                     
        {
            die('Hier gibt es wohl grade ein Problem');
        }
        //Eingaben absichern
        $name = $db_link->real_escape_string(trim($name));
        $price = $db_link->real_escape_string(trim($price));
        $picturelink_unescaped = $picturelink;
        $picturelink = $db_link->real_escape_string(trim($picturelink));
        $description = $db_link->real_escape_string(trim($description));

        if($test)
        {
            echo 'Folgende Daten wurden eingegeben:<br>Name:       ';
            var_dump($name);
            echo '<br>Preis:       ';
            var_dump($price);
            echo '<br>Bildlink:       ';
            var_dump($picturelink);
            echo '<br>Beschreibung:       ';
            var_dump($description);
            echo '<br><br><br>';
        }
        //Überprüfung ob Artikel oder Bild schon existiert
        $sqlrequest = "SELECT Name, Bildlink FROM artikel";
        $erg = $db_link->query($sqlrequest) or die($db_link->error);
        if($test)
        {
            if($erg->num_rows)                                              //num_rows gibt die Anzahl der ausgelesenen Datensätze zurück
            {
                echo '<br><p>Prüfung: Es sind '.$erg->num_rows.' Datensätze vorhanden</p>';
            }
            else
            {
                echo '<p>Es sind keine Datensätze vorhanden</p>';
            }
        }
        $picturelink_exists = false;
        $name_exists = false;
        while ($zeile = $erg->fetch_object())
        {
                if($name==$zeile->Name)
                {
                    $name_exists = true;
                }
                if($picturelink_unescaped==$zeile->Bildlink)
                {
                    $picturelink_exists = true;
                }
        }

        //Einfügen in die DB
        if($name_exists)
        {
            $output = "Der Artikelname existiert bereits.";
        }
        elseif($picturelink_exists)
        {
            $output = "Der Dateipfad für das Bild existiert bereits.";
        }
        else
        {
            header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
            $sqlrequest = "INSERT INTO artikel (PK_Artikel, Name, Preis, Bildlink, Beschreibung) VALUES (NULL, '{$name}', '{$price}', '{$picturelink}', '{$description}');";

            $db_link->query($sqlrequest);
            
            $output = $db_link->affected_rows;
        }
    return $output;
    }

    function deleteArtikel ($pk_artikel)
    {
        include_once 'fct_sqlconnect.php';
        include_once 'fct_editArtikelSchlagworte.php';
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
        $picturelink_unescaped = $picturelink;
        $picturelink = $db_link->real_escape_string(trim($picturelink_unescaped));
        $description = $db_link->real_escape_string(trim($description));
    
        //Überprüfung ob Artikel oder Bild schon existiert
        $sqlrequest = "SELECT PK_Artikel, Name, Bildlink FROM artikel";
        $erg = $db_link->query($sqlrequest) or die($db_link->error);
        $picturelink_exists = false;
        $name_exists = false;
        while ($zeile = $erg->fetch_object())
        {
            if($zeile->PK_Artikel != $pk_artikel)
            {
                if($name==$zeile->Name)
                {
                    $name_exists = true;
                }
                if($picturelink_unescaped==$zeile->Bildlink)
                {
                    $picturelink_exists = true;
                }
            }
        }
        //Editieren des Datensatzes
        if($name_exists)
        {
            $output = "Der Artikelname existiert bereits.";
        }
        elseif($picturelink_exists)
        {
            $output = "Der Dateipfad des Bildes existiert bereits.";
        }
        else
        {
            header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
            $sqlrequest = "UPDATE artikel SET Name = '{$name}', Preis = '{$price}', Bildlink = '{$picturelink}', Beschreibung = '{$description}' WHERE artikel.PK_Artikel = {$pk_artikel};";
            $db_link->query($sqlrequest);
            $output = $db_link->affected_rows;
        }
        return $output;
    }
?>
    