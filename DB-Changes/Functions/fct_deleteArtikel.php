<?php
    function deleteArtikel ($pk_artikel)
    {
        include 'fct_sqlconnect.php';

        $pk_artikel = $db_link->real_escape_string(trim($pk_artikel));

        
        if($db_link->connect_errno)
        {
            die('Hier gibt es wohl grade ein Problem.');
        }

        $sqlrequest = "DELETE FROM artikelschlagworte WHERE artikelschlagworte.FK_Artikel = '{$pk_artikel}'";
        $erg = $db_link->query($sqlrequest);
        
        echo 'Geloeschte Schlagworte: '.$db_link->affected_rows;
        
        
        $sqlrequest = "DELETE FROM artikel WHERE artikel.PK_Artikel = '{$pk_artikel}';";
        $erg = $db_link->query($sqlrequest);

        echo 'Geloeschte Artikel: '.$db_link->affected_rows;
    }
?>