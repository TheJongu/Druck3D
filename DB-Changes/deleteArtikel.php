<?php
    include_once 'Functions/fct_editArtikel.php';
    $pk_artikel = $_GET['pk_artikel'];

    deleteArtikel($pk_artikel);

    header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
?>