<?php
    error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'Druck3DDB';

    $db_link = new mysqli($host, $user, $password, $db);            //Verbindungsaufbau zur Datenbank
    print_r($db_link->connect_error);
    
    if($db_link->connect_errno)                                     
    {
        die('Hier gibt es wohl grade ein Problem');
    }

    $sqlrequest = 'SELECT * FROM artikel';

    $erg = $db_link->query($sqlrequest) or die($db_link->error);    //Liest die Datenbank aus
    
    if($erg->num_rows)                                              //num_rows gibt die Anzahl der ausgelesenen Datensätze zurück
    {
        echo '<p>Es sind '.$erg->num_rows.' Datensätze vorhanden</p>';
    }
    else
    {
        echo '<p>Es sind keine Datensätze vorhanden</p>';
    }

    while ($zeile = $erg->fetch_object())                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
    {
        echo '<br>' . $zeile->PK_Artikel .'-----'.$zeile->Name.'-----'.$zeile->Preis.'-----'.$zeile->Rating;
    }
    
    echo '<br><br><br>-------------------------------------<br>'.date("H:i:s");
    
    //Link zu Datenbankausgeben tutorial: https://www.php-kurs.com/db-inhalte-ausgeben.htm  
?>