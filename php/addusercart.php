<?php
    header("Location: Druck3DShop.php");
    include_once '../DB-Changes/Functions/fct_warenkorb.php';
    include_once '../DB-Changes/Functions/fct_sqlconnect.php';
    
    $pk_user = $_GET['pk_nutzer'];
    $pk_article = $_GET['pk_artikel'];

    $sql = "SELECT FK_Artikel FROM warenkorbartikel WHERE FK_Nutzer=?";
    $handle = fill_statement($sql, array($pk_user));
    $handle->execute();

    $article_existing = false;

    while($zeile = $handle->fetch(PDO::FETCH_OBJ))
    {
        if($zeile->FK_Artikel == $pk_article)
        {
            $article_existing = true;
        }
    }
    
    if(!$article_existing)
    {
        addArticleToUserCart($pk_user, $pk_article);
    }
?>