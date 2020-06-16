<?php
    
    //error_reporting(0);                                   //unterbindet die PHP-eigenen Fehlermeldungen
    
    $db_link = sqlconnect();
    if($db_link->connect_errno)                                     
    {
        die('Hier gibt es wohl grade ein Problem');
    }
    
    $name = $db_link->real_escape_string(trim($_GET['name']));
    $price = $db_link->real_escape_string(trim($_GET['price']));
    $picturelink = $db_link->real_escape_string(trim($_GET['picturelink']));
    $picturelink_unescaped = $_GET['picturelink'];                               //Sicherheitslücke
    $description = $db_link->real_escape_string(trim($_GET['description']));

    echo 'Folgende Daten wurden eingegeben:<br>Name:       ';
    var_dump($name);
    echo '<br>Preis:       ';
    var_dump($price);
    echo '<br>Bildlink:       ';
    var_dump($picturelink);
    echo '<br>Beschreibung:       ';
    var_dump($description);
    echo '<br><br><br>';
    

    $sqlrequest = "SELECT Name FROM artikel";

    $erg = $db_link->query($sqlrequest) or die($db_link->error);    //Liest die Datenbank aus
    
    if($erg->num_rows)                                              //num_rows gibt die Anzahl der ausgelesenen Datensätze zurück
    {
        echo '<br>---------Überprüfungen---------<br><p>Namensüberprüfung: Es sind '.$erg->num_rows.' Datensätze vorhanden</p>';
    }
    else
    {
        echo '<p>Es sind keine Datensätze vorhanden</p>';
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
    
    if($erg->num_rows)                                              //num_rows gibt die Anzahl der ausgelesenen Datensätze zurück
    {
        echo '<p>Bildpfadüberprüfung: Es sind '.$erg->num_rows.' Datensätze vorhanden</p>';
    }
    else
    {
        echo '<p>Es sind keine Datensätze vorhanden</p>';
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
        echo '<p>Der Artikelname existiert bereits.</p>';
    }
    elseif($picturelink_exists)
    {
        echo '<p>Der Dateipfad für das Bild existiert bereits. Es wurden keine Datensätze hinzugefügt</p>';
    }
    else
    {
        $sqlrequest = "INSERT INTO artikel (PK_Artikel, Name, Preis, Bildlink, Beschreibung) VALUES (NULL, '{$name}', '{$price}', '{$picturelink}', '{$description}');";

        $db_link->query($sqlrequest);
        
        echo '<br><br><br>Angefügte Datensätze: '.$db_link->affected_rows;
    }



    function sqlconnect()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'Druck3DDB';

        return new mysqli($host, $user, $password, $db);
    }
?>