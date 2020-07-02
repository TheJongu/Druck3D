<?php
    //Include relevante Funktionsdateien
    include_once 'Functions/fct_Schlagworte.php';
    include_once 'Functions/fct_ArtikelSchlagworte.php';
    //erhalte Checkboxen-Wert -> die Schlagworte
    $schlagwort = $_GET['newschlagwort'];
    $pk_artikel = $_GET['pk_artikel'];
    //erhalte die PK des Artikels
    echo $schlagwort;

    createTag($schlagwort);
    //Gehe zurück zur DisplayAllArtikel Seite
    header("Location: ./displayAllArtikel.php?");

?>