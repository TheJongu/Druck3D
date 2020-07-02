<?php
    //Include relevante Funktionsdateien
    include_once 'Functions/fct_ArtikelSchlagworte.php';
    //erhalte Checkboxen-Wert -> die Schlagworte
    $schlagworteArray = $_GET['checkboxes'];
    //erhalte die PK des Artikels
    $pk_artikel = $_GET['pk_artikel'];
    //Lösche alle ArtikelSchlagworte für diesen Artikel
    removeAllArticleTags($pk_artikel);
    //Für jedes schlagwort im SchlagwortArray
    foreach ($schlagworteArray as $schlagwort){ 
        //Füge in Artikelschlagworte ein: pk_artikel <-> schlagwort_id
        addArticleTag($pk_artikel, $schlagwort);
    }	
    //Gehe zurück zur DisplayAllArtikel Seite
    header("Location: ./displayAllArtikel.php");

?>