<?php
    include_once 'fct_Artikel.php';

    $name = $_GET['name'];
    $image_link = $_GET['picture_link'];

    if (isset($_GET['pk_article'])) {
        echo articleExists($name, $image_link, $_GET['pk_article']);
    } else {
        echo articleExists($name, $image_link);
    }