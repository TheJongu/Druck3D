<?php
    header("Location: Druck3DShop.php");
    include_once '../DB-Changes/Functions/fct_warenkorb.php';
    include_once '../DB-Changes/Functions/fct_sqlconnect.php';
    
    $pk_user = $_GET['pk_nutzer'];
    $pk_article = $_GET['pk_artikel'];

    $sql = "SELECT FK_Nutzer FROM warenkorbartikel WHERE FK_Artikel=?";
    $handle = fill_statement($sql, array($pk_article));
    $handle->execute();
    
    if($handle->rowCount()==0)
    {
        addArticleToUserCart($pk_user, $pk_article);
    }
?>