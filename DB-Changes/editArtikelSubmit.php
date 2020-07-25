<?php
    include_once 'Functions/fct_Artikel.php';
    header("Location: ./displayAllArtikel.php");

    $pk_artikel = $_GET['pk_artikel'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    $onsale = 0;
    $picturelink = $_GET['picturelink'];
    $description = $_GET['description'];

    if(isset($_GET['onsale']))
    {
        $onsale = 1;
    }

    editArticle($pk_artikel, $name, $price, $picturelink, $description, $onsale);
?>