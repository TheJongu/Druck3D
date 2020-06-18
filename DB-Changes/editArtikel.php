<?php
    include_once 'Functions/fct_sqlconnect.php';

    $pk_artikel = $db_link->real_escape_string(trim($_GET['pk_artikel']));

    $sqlrequest = "SELECT Name, Preis, Bildlink, Beschreibung  FROM Artikel WHERE artikel.PK_Artikel = '{$pk_artikel}'";
    $erg = $db_link->query($sqlrequest) or die($db_link->error);

    if($db_link->affected_rows==1)
    $zeile = $erg->fetch_object();

    $name = $zeile->Name;
    $price = $zeile->Preis;
    $picturelink = $zeile->Bildlink;
    $description = $zeile->Beschreibung;

    var_dump($name);
    echo '<br>';
    var_dump($price);
    echo '<br>';
    var_dump($picturelink);
    echo '<br>';
    var_dump($description);





?>