<?php
    //Include relevante Funktionsdateien
    include_once 'Functions/fct_sqlconnect.php';
    include_once 'Functions/fct_Schlagworte.php';
    include_once 'Functions/fct_ArtikelSchlagworte.php';
    //erhalte Checkboxen-Wert -> die Schlagworte
    $schlagwort = $_GET['newschlagwort'];
    $pk_artikel = $_GET['pk_artikel'];
    //erhalte die PK des Artikels
    echo $schlagwort;

    addNewSchlagwort($schlagwort);
    //Gehe zurück zur DisplayAllArtikel Seite
    header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php?");

?>