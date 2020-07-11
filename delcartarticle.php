<?php
  
    include_once 'DB-Changes/Functions/fct_warenkorb.php';
    
    $pk_user = $_GET['pk_nutzer'];
    $pk_article = $_GET['pk_artikel'];

    removeArticleFromUserCart($pk_user, $pk_article);

    header("Location: ./cart.php");
?>