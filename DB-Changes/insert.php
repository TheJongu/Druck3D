<?php
    include_once 'Functions/fct_Artikel.php';
    header("Location: ./displayAllArtikel.php");

    $name = $_GET['name'];
    $price = $_GET['price'];
    $onsale = 0;
    $picturelink = $_GET['picturelink'];
    $description = $_GET['description'];
    
    if(isset($_GET['onsale']))
    {
        $onsale = 1;
    }
    
    insertArticle($name, $price, $picturelink, $description, $onsale);
?>