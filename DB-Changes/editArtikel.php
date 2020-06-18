<?php
    include_once 'Functions/fct_sqlconnect.php';

    $pk_artikel = $db_link->real_escape_string(trim($_GET['pk_artikel']));

    $sqlrequest = "SELECT Name, Preis, Bildlink, Beschreibung  FROM Artikel WHERE artikel.PK_Artikel = '{$pk_artikel}'";
    $erg = $db_link->query($sqlrequest) or die($db_link->error);

    if($db_link->affected_rows==1)
    {
        $zeile = $erg->fetch_object();

        $name = $zeile->Name;
        $price = $zeile->Preis;
        $picturelink = $zeile->Bildlink;
        $description = $zeile->Beschreibung;
?>
        <form action="http://localhost/_Repo/Druck3D/DB-Changes/editArtikelSubmit.php" method="GET">
<?php                                                   //Vorausgefülltes Formular zum editieren des Artikels
                echo "<label for='name'>Artikelname:</label><input name='name' id='name' type='text' size='15' maxlength='30' placeholder='Name' value='{$name}' title='Name des Artikels' required><br>";
                echo "<label for='price'>Preis:</label><input name='price' id='price' type='text' size='4' maxlength='7' pattern='[0-9]{0,4}(\.[0-9]{0,2})?' placeholder='0000.00' value='{$price}' title='Preis des Artikels'><br>";
                echo "<label for='picturelink'>Bildpfad:</label><input name='picturelink' id='picturelink' type='text' size='30' maxlength='70' placeholder='C:\Beispielpfad\Beispielbild.png' value='{$picturelink}' title='Dateipfad des Artikelbildes'><br>";
                echo "<label for='description'>Beschreibung:</label><input name='description' id='description' type='text' placeholder='Dies ist ein Artikel' value='{$description}' title='Artikelbeschreibung'><br>";
                echo "<input type='hidden' name='pk_artikel' value='{$pk_artikel}'>";
                echo "<input type='submit' value='Speichern'>";

        echo "</form>";
    }
?> 