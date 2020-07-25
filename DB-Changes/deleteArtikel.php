<?php
    include_once 'Functions/fct_Artikel.php';
    header("Location: ./displayAllArtikel.php");
    
    $pk_artikel = $_GET['pk_artikel'];

    deleteArticle($pk_artikel);
?>