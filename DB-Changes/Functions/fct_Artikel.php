<?php
include_once 'fct_sqlconnect.php';
include_once 'fct_ArtikelSchlagworte.php';

function insertArticle(string $name, float $price, string $picture_link, string $description, int $onsale) {
    $sql = 'INSERT INTO artikel (PK_Artikel, Name, Preis, Bildlink, Beschreibung, Onsale) VALUES (NULL, ?, ?, ?, ?, ?)';
    $handle = fill_statement($sql, array($name, $price, $picture_link, $description, $onsale));
    $handle->execute();
}

function articleExists(string $name, string $picturelink, int $pk_article = 0): int {
    $sql = 'SELECT PK_Artikel, Name, Bildlink FROM artikel WHERE Name = ? OR Bildlink = ?';
    $handle = fill_statement($sql, array($name, $picturelink));
    $handle->execute();
    
    $name_exists = false;
    $image_exists = false;
    while($result = $handle->fetch(PDO::FETCH_OBJ))
    {
        if ($result->PK_Artikel == $pk_article) continue;
        if ($result->Name == $name) $name_exists = true;
        if ($result->Bildlink == $picturelink) $image_exists = true;
        }
        if ($name_exists && !$image_exists) {           //Name existiert
            return 2;
        } else if ($image_exists && !$name_exists) {    //Bild existiert
            return 3;
        } else if ($image_exists && $name_exists){      //Name und Bild existiert
            return 1;
    }
    return 0;                                           //Artikel existiert nicht
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
        removeAllArticleTags($pk_article);
        $sql = 'DELETE FROM artikel WHERE PK_Artikel = ? ';
        $handle = fill_statement($sql, array($pk_article));
        $handle->execute();
    }
}

function editArticle(int $pk_article, string $name, float $price, string $image_link, string $description, int $onsale) {
      $sql = 'UPDATE artikel SET Name = ?, Preis = ?, Bildlink = ?, Beschreibung = ?, Onsale = ? WHERE artikel.PK_Artikel = ?';
      $handle = fill_statement($sql, array($name, $price, $image_link, $description, $onsale, $pk_article));
      $handle->execute();
}
