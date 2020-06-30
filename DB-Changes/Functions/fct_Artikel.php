<?php
include_once 'fct_sqlconnect.php';

abstract class ArticleCodes {
    const DOESNT_EXIST = 0;
    const NAME_EXISTS = 1;
    const IMAGE_EXISTS = 2;
    const BOTH_EXIST = 3;
}

function insertArticle(string $name, float $price, string $picture_link, string $description) {
    $sql = 'INSERT INTO artikel (PK_Artikel, Name, Preis, Bildlink, Beschreibung) VALUES (NULL, ?, ?, ?, ?)';
    $handle = fill_statement($sql, array($name, $price, $picture_link, $description));
    $handle->execute();
}

// TODO: Resolve name search issues, not working yet
function articleExists(string $name, string $image_link, int $pk_article = 0): int {
    $sql = 'SELECT (PK_Artikel, Name, Bildlink) FROM artikel WHERE Name = ?';
    $handle = fill_statement($sql, array($name));
    $handle->execute();
    echo $handle->queryString;
    $results = $handle->fetchAll(PDO::FETCH_ASSOC);
    print_r($results);
    if (sizeof($results) != 0) {
        $name_exists = false;
        $image_exists = false;
        foreach ($results as $result) {
            if ($result['PK_Artikel'] == $pk_article) continue;
            if ($result['Name'] == $name) $name_exists = true;
            if ($result['Bildlink'] == $image_link) $image_exists = true;
        }
        if ($name_exists && !$image_exists) {
            return ArticleCodes::NAME_EXISTS;
        } else if ($image_exists && !$name_exists) {
            return ArticleCodes::IMAGE_EXISTS;
        } else {
            return ArticleCodes::BOTH_EXIST;
        }
    }
    return ArticleCodes::DOESNT_EXIST;
}

function articleExistsPK(int $pk_article): bool {
    $sql = 'SELECT Name FROM artikel where PK_Artikel = ?';
    $handle = fill_statement($sql, array($pk_article));
    $handle->execute();
    if ($handle->rowCount() == 0) {
        return false;
    }
    return true;
}


function deleteArticle(int $pk_article) {
    if (articleExistsPK($pk_article)) {
        deleteArtikelSchlagworteForPk_Artikel($pk_article);
        $sql = 'DELETE FROM artikel WHERE PK_Artikel = ? ';
        $handle = fill_statement($sql, array($pk_article));
        $handle->execute();
    }
}

function editArticle(int $pk_article, string $name, float $price, string $image_link, string $description) {
      $sql = 'UPDATE artikel SET Name = ?, Preis = ?, Bildlink = ?, Beschreibung = ? WHERE artikel.PK_Artikel = ?';
      $handle = fill_statement($sql, array($name, $price, $image_link, $description, $pk_article));
      $handle->execute();
}



