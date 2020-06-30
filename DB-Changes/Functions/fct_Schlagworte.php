<?php
include_once 'fct_sqlconnect.php';

function createTag(string $tag) {
    $sql = 'INSERT INTO schlagworte (PK_Schlagwort, Schlagwort) VALUES (NULL, ?)';
    $handle = fill_statement($sql, array($tag));
    $handle->execute();
}

function deleteTag(string $tag) {
    deleteTagPK(getTagPK($tag));
}

function deleteTagPK(int $pk_tag) {
    $sql = "DELETE FROM schlagworte WHERE PK_Schlagwort = ?";
    $handle = fill_statement($sql, array($pk_tag));
    $handle->execute();
}

function getTagPK(string $tag): int {
    $sql = 'SELECT PK_Schlagwort FROM Schlagworte WHERE Schlagwort = ?';
    $handle = fill_statement($sql, array($tag));
    $handle->execute();
    return $handle->fetch(PDO::FETCH_ASSOC)['PK_Schlagwort'];
}