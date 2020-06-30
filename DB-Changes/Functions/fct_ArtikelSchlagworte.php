<?php
include_once 'fct_sqlconnect.php';
    function deleteArtikelSchlagworteForPk_Artikel ($pk_artikel)
    {
        $sql = "DELETE FROM artikelschlagworte WHERE artikelschlagworte.FK_Artikel = ?";
        $handle = fill_statement($sql, array($pk_artikel));
        $handle->execute();

        echo 'Geloeschte Schlagworte: '.$handle->rowCount();

        /*ALTER CODE
        //Sicherheitsabfrage: Prüfe den String, Sichere Ab, dass die DB ihn akzeptiert und keine Fehler provoziert
        //$pk_artikel = $db_link->real_escape_string(trim($pk_artikel));

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
        echo 'Geloeschte Schlagworte: '.$db_link->affected_rows;*/
    }
    function deleteArtikelSchlagworteForPk_Schlagwort ($pk_schlagwort)
    {
        $sql = "DELETE FROM artikelschlagworte WHERE artikelschlagworte.FK_Schlagwort = ?";
        $handle = fill_statement($sql, array($pk_schlagwort));
        $handle->execute();

        echo 'Geloeschte Schlagworte: '.$handle->rowCount();
        
        /*ALTER CODE
        //Sicherheitsabfrage: Prüfe den String, Sichere Ab, dass die DB ihn akzeptiert und keine Fehler provoziert
        $pk_schlagwort = $db_link->real_escape_string(trim($pk_schlagwort));
        echo "Das schlagwort hat die ID: $pk_schlagwort";
        //Wenn es einen Fehler gab
        if($db_link->connect_errno)
        {
            die('Hier gibt es wohl grade ein Problem.');
        }
        //Das SQl Statement
        $sqlrequest = "DELETE FROM artikelschlagworte WHERE artikelschlagworte.FK_Schlagwort = '{$pk_schlagwort}'";
        //Stelle DB die SQL-Anfrage
        $erg = $db_link->query($sqlrequest);
        //Ausgabe: SchlagworteVerbindungen gelöscht: "Anzahl"
        echo 'Geloeschte Schlagworte: '.$db_link->affected_rows;*/
    }

    function addArtikelSchlagworteForPk_Artikel($pk_artikel, $schlagwort)
    {
        $sql = "SELECT PK_Schlagwort FROM Schlagworte WHERE Schlagworte.schlagwort = ?";
        $handle = fill_statement($sql, array($schlagwort));
        $handle->execute();
        //Hole das Objekt
        $schlagwortObject = $handle->fetch(PDO::FETCH_OBJ);
        //Lese die FK_Schlagwort aus
        $pk_schlagwort = $schlagwortObject->PK_Schlagwort;

        echo "<br>SchlagwortID: $pk_schlagwort<br>";
        echo "ArtikelID: $pk_artikel<br>";
        //Einfügen der Artikelschlagworte
        $sql = "INSERT INTO `artikelschlagworte` (`FK_Artikel`, `FK_Schlagwort`) VALUES ?, ?";
        $handle = fill_statement($sql, array($pk_artikel, $pk_schlagwort));
        $handle->execute();

        echo 'Geänderte Schlagworte: '.$handle->rowCount();
        
        /*ALTER CODE
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
        echo 'Geänderte Schlagworte: '.$db_link->affected_rows;*/
    }

?>
    