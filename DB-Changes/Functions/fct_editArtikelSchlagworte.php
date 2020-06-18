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
?>
    