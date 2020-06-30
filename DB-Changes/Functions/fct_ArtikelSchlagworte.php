<?php
include_once 'fct_sqlconnect.php';
include_once 'fct_Schlagworte.php';

function removeAllArticleTags($pk_article) {
    $sql = "DELETE FROM artikelschlagworte WHERE artikelschlagworte.FK_Artikel = ?";
    $handle = fill_statement($sql, array($pk_article));
    $handle->execute();
}

function removeTagFromArticles($pk_tag) {
    $sql = 'DELETE FROM artikelschlagworte WHERE artikelschlagworte.FK_Schlagwort = ?';
    $handle = fill_statement($sql, array($pk_tag));
    $handle->execute();
}

function addArticleTag(int $pk_article, string $tag) {
    addArticleTagPK($pk_article, getTagPK($tag));
}

function addArticleTagPK(int $pk_article, int $pk_tag) {
    $sql = 'INSERT INTO artikelschlagworte (FK_Artikel, FK_Schlagwort) VALUES (?, ?)';
    $handle = fill_statement($sql, array($pk_article, $pk_tag));
    $handle->execute();
}

function removeArticleTag($pk_article, $tag) {
    removeArticleTagPK($pk_article, getTagPK($tag));
}

function removeArticleTagPK($pk_article, $pk_tag) {
    $sql = 'DELETE FROM artikelschlagworte WHERE FK_Artikel = ? AND FK_Schlagwort = ?';
    $handle = fill_statement($sql, array($pk_article, $pk_tag));
    $handle->execute();
}

    