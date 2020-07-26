<?php
include_once 'Functions/fct_sqlconnect.php';
//SQL-Anfrage, um das Formular schon vorauszufüllen
$pk_artikel = $_GET['pk_artikel'];
$sql = "SELECT Name, Preis, Bildlink, Beschreibung, Onsale FROM Artikel WHERE artikel.PK_Artikel = ?";
$handle = fill_statement($sql, [$pk_artikel]);
$handle->execute();

//$pk_artikel = $db_link->real_escape_string(trim($_GET['pk_artikel']));
//$sqlrequest = "SELECT Name, Preis, Bildlink, Beschreibung  FROM Artikel WHERE artikel.PK_Artikel = '{$pk_artikel}'";
//$erg = $db_link->query($sqlrequest) or die($db_link->error);

if ($handle->rowCount() == 1) {

    $zeile = $handle->fetch(PDO::FETCH_OBJ);

    $name = $zeile->Name;
    $price = $zeile->Preis;
    $onsale = $zeile->Onsale;
    $picturelink = $zeile->Bildlink;
    $description = $zeile->Beschreibung;
    ?>
        <html>
            <head>
                <title>Bearbeiten</title>
                <meta charset="UTF-8">
                <style>
                    div.errorDescr{
                        color: red;
                        display: none;
                    }
                </style>
                <script src="http://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                    crossorigin="anonymous">
                    //jquery einbinden
                </script>
            </head>
            <body>


        
                <form action="editArtikelSubmit.php" method="GET" id="editArtikelForm">
    <?php //Vorausgefülltes Formular zum Editieren des Artikels
    //Vorausgefülltes Formular zum Editieren des Artikels
    ?>
    echo "<table  style='margin:0 left;'>";
    echo "<tr>";
    echo "<td style='text-align:center;'> <h1> Artikel Bearbeiten </h1></td>";
    echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th style='text-align:center;'>Artikelname</th>";
    echo "<th style='text-align:center; flex-wrap: nowrap;'><label for='name'></label><input name='name' id='name' type='text' size='30' maxlength='70' placeholder='Name' value='{$name}' title='Name des Artikels' required><div class='errorDescr' id='nameExisting'>Der Artikelname existiert bereits.</div><div class='errorDescr' id='nameError'>Bitte geben Sie kein ' ein.</div><br></th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th style='text-align:center'>Preis</th>";
    echo "<th style='text-align:center; flex-wrap: nowrap;'><label for='price'></label><input name='price' id='price' type='text' size='30' maxlength='70' pattern='[0-9]{0,4}(\.[0-9]{0,2})?' placeholder='0000.00' value='{$price}' title='Preis des Artikels'><div class='errorDescr' id='priceError'>Bitte geben Sie einen gültigen Preis an.</div><br></th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th style='text-align:center'>Im Angebot</th>";
    echo "<th style='text-align:left; flex-wrap: nowrap;'>";
    if ($onsale) {
        echo "<label for='onsale'></label><input type='checkbox' name='onsale' id='onsale' checked><br>";
    } else {
        echo "<label for='onsale'></label><input type='checkbox' name='onsale' id='onsale'><br>";
    }
    echo "</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th style='text-align:center'>Bildpfad</th>";
    echo "<th style='text-align:center; flex-wrap: nowrap;'><label for='picturelink'></label><input name='picturelink' id='picturelink' type='text' size='30' maxlength='70' placeholder='C:\Beispielpfad\Beispielbild.png' value='{$picturelink}' title='Dateipfad des Artikelbildes'><div class='errorDescr' id='picturelinkExisting'>Der Bildpfad existiert bereits.</div><div class='errorDescr' id='picturelinkError'>Bitte geben Sie kein ' ein.</div><br></th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th style='text-align:center'>Beschreibung</th>";
    echo "<th style='text-align:center; flex-wrap: nowrap;'><label for='description'></label><input name='description' id='description' type='text' size='30' placeholder='Dies ist ein Artikel' value='{$description}' title='Artikelbeschreibung'><div class='errorDescr' id='descriptionError'>Bitte geben Sie kein ' ein.</div><br></th>";
    echo "</tr>";
    echo "<tr>";
    //echo "<th style='text-align:center'>pk_artikel</th>";
    echo "<th style='text-align:center; flex-wrap: nowrap;'><input type='hidden' name='pk_artikel' id='pk_artikel' value='{$pk_artikel}'></th>";
    echo "</tr>";
    echo "<th style='text-align:center'> <input type='button' value='Speichern'  onclick='validate()'> </th>";
    echo "<th></th>";
    echo "</tr>";
    echo "<form action='viewArticle.php' method='POST'>";
    echo "<th style='text-align:center'> <input type='button' value='Abbrechen'  onclick='validate()'> </th>";
    echo "<th></th>";
    echo "</tr>";
    echo "</form>";
    echo "</table>";
    echo "</form>";
    ?>
                <script>

                    function submitForm()
                    {
                        document.getElementById("editArtikelForm").submit();
                    }

                    const validate = () => {
                        //Reset UI
                        var errorDescrs = document.getElementsByClassName("errorDescr");
                        for(var i = 0;i<errorDescrs.length;i++)
                        {
                            errorDescrs[i].style.display = "none";
                        }

                        const pk_artikel = document.getElementById("pk_artikel").value;
                        const name = document.getElementById("name").value;
                        const price = document.getElementById("price").value;
                        const picturelink = document.getElementById("picturelink").value;
                        const description = document.getElementById("description").value;

                        const REGEX = /^[^']*$/;
                        const priceREGEX = /^[0-9]{1,4}([.][0-9]{2})?$/;

                        var error_exists = false;
                        if(!REGEX.test(name))
                        {
                            document.getElementById("nameError").style.display = "block";
                            error_exists = true;
                        }
                        if(!priceREGEX.test(price))
                        {
                            document.getElementById("priceError").style.display = "block";
                            error_exists = true;
                        }
                        if(!REGEX.test(picturelink))
                        {
                            document.getElementById("picturelinkError").style.display = "block";
                            error_exists = true;
                        }
                        if(!REGEX.test(description))
                        {
                            document.getElementById("descriptionError").style.display = "block";
                            error_exists = true;
                        }
                        if(error_exists)
                        {
                            return;
                        }

                        var a = $.ajax({
                        type: "GET",
                        url: 'Functions/validateArtikel.php',
                        data: { name: name,
                                picturelink: picturelink,
                                pk_article: pk_artikel
                            },
                        async: true
                    }).done(function(data){
                        //alert('Antwort: ' + data);
                        if(data == 0)
                        {
                            //alert('Kein Fehler');
                            submitForm();
                        }
                        else if(data == 1){
                            //alert('Der Artikelname und Bild sind bereits vorhanden');
                            document.getElementById("nameExisting").style.display = "block";
                            document.getElementById("picturelinkExisting").style.display = "block";
                        }
                        else if(data == 2){
                            //alert('Der Artikelname existiert bereits');
                            document.getElementById("nameExisting").style.display = "block";
                        }
                        else if(data == 3)
                        {
                            //alert('Der Bildpfad existiert bereits');
                            document.getElementById("picturelinkExisting").style.display = "block";
                        }
                        else{
                            alert('Kommunikation zwischen validateArtikel und hier stimmt nicht.');
                        }
                    });

                    }
                </script>
            </body>
        </html>
<?php
}
?>
