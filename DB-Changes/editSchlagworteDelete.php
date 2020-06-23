<?php
    //Include relevante Funktionsdateien
    include_once 'Functions/fct_sqlconnect.php';
    include_once 'Functions/fct_ArtikelSchlagworte.php';
    include_once 'Functions/fct_Schlagworte.php';
    //erhalte die PK des Artikels
    $pk_schlagwort = $_GET['pk_schlagwort'];
    //Lösche alle ArtikelSchlagworte für diesen Artikel
    deleteArtikelSchlagworteForPk_Schlagwort($pk_schlagwort);
    deleteSchlagwort($pk_schlagwort);
    //Gehe zurück zur Seite
    header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");

?>