<?php
    include_once 'Functions/fct_Artikel.php';

    $pk_artikel = $_GET['pk_artikel'];

    deleteArticle($pk_artikel);

    header("Location: ./displayAllArtikel.php");
?>