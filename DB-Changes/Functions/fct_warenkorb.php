<?php
include_once 'fct_sqlconnect.php';
include_once 'fct_Schlagworte.php';

function removeAllArticleFromUserCart($pk_user) {
    $sql = 'DELETE FROM warenkorbartikel WHERE warenkorbartikel.FK_Nutzer = ?';
    $handle = fill_statement($sql, array($pk_user));
    $handle->execute();
}

function removeArticleFromUserCart($pk_user, $pk_article) {
    $sql = 'DELETE FROM warenkorbartikel WHERE warenkorbartikel.FK_Nutzer = ? AND warenkorbartikel.FK_Artikel = ?';
    $handle = fill_statement($sql, array($pk_user, $pk_article));
    $handle->execute();
}

function addArticleToUserCart($pk_user, $pk_article) {
    $sql = 'INSERT INTO warenkorbartikel (FK_Nutzer, FK_Artikel) VALUES (?, ?)';
    $handle = fill_statement($sql, array($pk_user, $pk_article));
    $handle->execute();
}

function removeArticleFromAllUserCarts($pk_article)
{
    $sql = "DELETE FROM warenkorbartikel WHERE warenkorbartikel.FK_Artikel = ?";
    $handle = fill_statement($sql, array($pk_article));
    $handle->execute();
}

?>
    