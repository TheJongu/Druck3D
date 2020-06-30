<?php
    function addNewSchlagwort ($schlagwort)
    {
        include 'fct_sqlconnect.php';  
        //Sicherheitsabfrage: Prüfe den String, Sichere Ab, dass die DB ihn akzeptiert und keine Fehler provoziert
        $neuesSchlagwort = $db_link->real_escape_string(trim($schlagwort));
        
        //Wenn es einen Fehler gab
        if($db_link->connect_errno)
        {
            die('Hier gibt es wohl grade ein Problem.');
        }
        
        //Das SQl Statement: Füge neues Schlagwort ein
        $sqlInsertSchlagwort = "INSERT INTO `schlagworte` (`PK_Schlagwort`, `Schlagwort`) VALUES (NULL, '${neuesSchlagwort}');";
        //Stelle Request
        $erg = $db_link->query($sqlInsertSchlagwort);
        //Ausgabe der Fehler
        echo 'Geänderte Schlagworte: '.$db_link->affected_rows;
    }

    function deleteSchlagwort($delSchlagwort)
    {
        include 'fct_sqlconnect.php';  
        //Sicherheitsabfrage: Prüfe den String, Sichere Ab, dass die DB ihn akzeptiert und keine Fehler provoziert
        $delSchlagwort = $db_link->real_escape_string(trim($delSchlagwort));
        
        //Wenn es einen Fehler gab
        if($db_link->connect_errno)
        {
            die('Hier gibt es wohl grade ein Problem.');
        }
        
        //Das SQl Statement: Lösche das Schlagwort
        $sqlInsertSchlagwort = "DELETE FROM `schlagworte` WHERE `schlagworte`.`PK_Schlagwort` = '${delSchlagwort}';";
        //Stelle Request
        $erg = $db_link->query($sqlInsertSchlagwort);
        
        echo 'Geänderte Schlagworte: '.$db_link->affected_rows;
    }

?>