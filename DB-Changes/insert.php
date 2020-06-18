<?php
    include 'Functions/fct_insertArtikel.php';

    $name = $_GET['name'];
    $price = $_GET['price'];
    $picturelink = $_GET['picturelink'];
    $description = $_GET['description'];

    insertArtikel($name, $price, $picturelink, $description);
?>