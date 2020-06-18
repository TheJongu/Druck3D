<?php
    function deleteArtikelSchlagworteForPk_Artikel ($pk_artikel)
    {
        include 'fct_sqlconnect.php';  
        //Sicherheitsabfrage: Prüfe den String, Sichere Ab, dass die DB ihn akzeptiert und keine Fehler provoziert
        $pk_artikel = $db_link->real_escape_string(trim($pk_artikel));

        //Wenn es einen Fehler gab
        if($db_link->connect_errno)
        {
            die('Hier gibt es wohl grade ein Problem.');
        }
        //Das SQl Statement
        $sqlrequest = "DELETE FROM artikelschlagworte WHERE artikelschlagworte.FK_Artikel = '{$pk_artikel}'";
        //Stelle DB die SQL-Anfrage
        $erg = $db_link->query($sqlrequest);
        //Ausgabe: SchlagworteVerbindungen gelöscht: "Anzahl"
        echo 'Geloeschte Schlagworte: '.$db_link->affected_rows;
    }
    function addArtikelSchlagworteForPk_Artikel($pk_artikel, $schlagwort)
    {
        include 'fct_sqlconnect.php';  
        //Sicherheitsabfrage: Prüfe den String, Sichere Ab, dass die DB ihn akzeptiert und keine Fehler provoziert
        $pk_artikel = $db_link->real_escape_string(trim($pk_artikel));
        $schlagwort = $db_link->real_escape_string(trim($schlagwort));

        //Wenn es einen Fehler gab
        if($db_link->connect_errno)
        {
            die('Hier gibt es wohl grade ein Problem.');
        }
        //Das SQl Statement: Frage FK_Schlagwort an
        $sqlRequestGetFk_Schlagwort = "SELECT PK_Schlagwort FROM Schlagworte WHERE Schlagworte.schlagwort = '{$schlagwort}';";
        //Stelle Request
        $erg = $db_link->query($sqlRequestGetFk_Schlagwort);

        //Hole das Object
        $schlagwortObject = $erg->fetch_object();
                //Lese die FK_Schlagwort aus
        $pk_schlagwort = $schlagwortObject->PK_Schlagwort;

        echo "<br>SchlagwortID: $pk_schlagwort<br>";
        echo "ArtikelID: $pk_artikel<br>";
        
        $sqlrequest = "INSERT INTO `artikelschlagworte` (`FK_Artikel`, `FK_Schlagwort`) VALUES ('{$pk_artikel}', '{$pk_schlagwort}')";
        
        //Stelle DB die SQL-Anfrage
        $erg = $db_link->query($sqlrequest);
        //Ausgabe: SchlagworteVerbindungen gelöscht: "Anzahl"
        echo 'Geänderte Schlagworte: '.$db_link->affected_rows;
    }

?>
    