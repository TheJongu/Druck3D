<?php
include_once 'fct_sqlconnect.php';

function insertArticle($name, $price, $picturelink, $description) {

    // Test for unique name
    // NOTE: I removed image link testing, if we later want to save images as base64 data we won't be able
    //      to check anyways.
    $sql = 'SELECT Name FROM artikel WHERE Name = ?';
    $handle = fill_statement($sql, array($name));
    $handle->execute();

    echo $handle->rowCount();

    if ($handle->fetch() > 0) {
        return 'Artikel existiert bereits';
    } else {
        $sql = 'INSERT INTO artikel (PK_Artikel, Name, Preis, Bildlink, Beschreibung) VALUES (NULL, ?, ?, ?, ?)';
        $handle = fill_statement($sql, array($name, $price, $picturelink, $description));
        echo $handle->queryString;
        if (!$handle->execute()) {
            return 'DB-Fehler';
        }
    }
    return 'Artikel eingefügt';
}


function deleteArtikel($pk_artikel) {
    include_once 'fct_sqlconnect.php';
    include_once 'fct_ArtikelSchlagworte.php';
    //Sichere den pk_artikel ab
    $pk_artikel = $db_link->real_escape_string(trim($pk_artikel));
    //Prüfe für DB Fehler
    if ($db_link->connect_errno) {
        die('Hier gibt es wohl grade ein Problem.');
    }
    //Lösche alle Schlagworte für den Artikel
    deleteArtikelSchlagworteForPk_Artikel($pk_artikel);

    //Lösche den Artikel vom Artikeltable
    $sqlrequest = "DELETE FROM artikel WHERE artikel.PK_Artikel = '{$pk_artikel}';";
    $erg = $db_link->query($sqlrequest);

    echo 'Geloeschte Artikel: ' . $db_link->affected_rows;
}

 function editArtikel($pk_artikel, $name, $price, $picturelink, $description)
  {
      include_once 'Functions/fct_sqlconnect.php';

      //Eingaben absichern
      $pk_artikel = $db_link->real_escape_string(trim($pk_artikel));
      $name = $db_link->real_escape_string(trim($name));
      $price = $db_link->real_escape_string(trim($price));
      $picturelink = $db_link->real_escape_string(trim($picturelink));
      $description = $db_link->real_escape_string(trim($description));

      //Editieren des Artikels
      $sqlrequest = "UPDATE artikel SET Name = '{$name}', Preis = '{$price}', Bildlink = '{$picturelink}', Beschreibung = '{$description}' WHERE artikel.PK_Artikel = {$pk_artikel};";
      $db_link->query($sqlrequest);

      if($db_link->affected_rows == 1)
      {
          return true;
      }
      else
      {
          return false;
      }
    }
    //Editieren des Datensatzes
    if ($name_exists) {
        $output = "Der Artikelname existiert bereits.";
    } elseif ($picturelink_exists) {
        $output = "Der Dateipfad des Bildes existiert bereits.";
    } else {
        header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
        $sqlrequest = "UPDATE artikel SET Name = '{$name}', Preis = '{$price}', Bildlink = '{$picturelink}', Beschreibung = '{$description}' WHERE artikel.PK_Artikel = {$pk_artikel};";
        $db_link->query($sqlrequest);
        $output = $db_link->affected_rows;
    }
    return $output;
}

echo insertArticle('Test', 25, '', 'Desc');


