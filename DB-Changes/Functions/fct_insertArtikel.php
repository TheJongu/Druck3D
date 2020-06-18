<?php
    function insertArtikel($name, $price, $picturelink, $description)
    {
        include 'fct_sqlconnect.php';

        //error_reporting(0);                                   //unterbindet die PHP-eigenen Fehlermeldungen
        $test = false;

        if($db_link->connect_errno)                                     
        {
            die('Hier gibt es wohl grade ein Problem');
        }
        
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

        $sqlrequest = "SELECT Name FROM artikel";

        $erg = $db_link->query($sqlrequest) or die($db_link->error);    //Liest die Datenbank aus
        
        if($test)
        {
            if($erg->num_rows)                                              //num_rows gibt die Anzahl der ausgelesenen Datensätze zurück
            {
                echo '<br>---------Überprüfungen---------<br><p>Namensüberprüfung: Es sind '.$erg->num_rows.' Datensätze vorhanden</p>';
            }
            else
            {
                echo '<p>Es sind keine Datensätze vorhanden</p>';
            }
        }

        $name_exists = false;
        while ($zeile = $erg->fetch_object())                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
        {
                if($name==$zeile->Name)
                {
                    $name_exists = true;
                }
        }

        $sqlrequest = "SELECT Bildlink FROM artikel";

        $erg = $db_link->query($sqlrequest) or die($db_link->error);    //Liest die Datenbank aus
        
        if($test)
        {
            if($erg->num_rows)                                              //num_rows gibt die Anzahl der ausgelesenen Datensätze zurück
            {
                echo '<p>Bildpfadüberprüfung: Es sind '.$erg->num_rows.' Datensätze vorhanden</p>';
            }
            else
            {
                echo '<p>Es sind keine Datensätze vorhanden</p>';
            }
        }

        $picturelink_exists = false;
        while ($zeile = $erg->fetch_object())                           
        {
                if($picturelink_unescaped==$zeile->Bildlink)
                {
                    $picturelink_exists = true;
                }
        }

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
?>
    