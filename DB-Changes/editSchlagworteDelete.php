<?php
    //Include relevante Funktionsdateien
    include_once 'Functions/fct_ArtikelSchlagworte.php';
    include_once 'Functions/fct_Schlagworte.php';
    //erhalte die pk_schlagwort
    $pk_schlagwort = $_GET['pk_schlagwort'];
    //Lösche alle ArtikelSchlagworte für dieses Schlagwort
    removeTagFromArticles($pk_schlagwort);
    //Lösche das Schlagwort
    deleteTagPK($pk_schlagwort);
    //Gehe zurück zur Seite
    header("Location: ./editSchlagworte.php");

?>