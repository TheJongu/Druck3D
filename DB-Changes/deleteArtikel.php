<?php
    include 'Functions/fct_deleteArtikel.php';
    $pk_artikel = $_GET['pk_artikel'];

    deleteArtikel($pk_artikel);

    header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
?>