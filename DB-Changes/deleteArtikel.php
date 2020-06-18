<?php
    header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
    include 'Functions/fct_deleteArtikel.php';
    $pk_artikel = $_GET['pk_Artikel'];

    deleteArtikel($pk_artikel);
?>