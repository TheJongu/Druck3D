<?php
    header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
    $db_link = sqlconnect();
    if($db_link->connect_errno)
    {
        die('Hier gibt es wohl grade ein Problem.');
    }
    $pk_artikel = $_GET['pk_Artikel'];

    $sqlrequest = "DELETE FROM artikelschlagworte WHERE artikelschlagworte.FK_Artikel = '{$pk_artikel}'";
    $erg = $db_link->query($sqlrequest);
    
    echo 'Geloeschte Schlagworte: '.$db_link->affected_rows;
    
    
    $sqlrequest = "DELETE FROM artikel WHERE artikel.PK_Artikel = '{$pk_artikel}';";
    $erg = $db_link->query($sqlrequest);

    echo 'Geloeschte Artikel: '.$db_link->affected_rows;

    function sqlconnect()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'Druck3DDB';

        return new mysqli($host, $user, $password, $db);
    }
?>