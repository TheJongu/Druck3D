<?php
    include_once 'Functions/fct_sqlconnect.php';
    //SQL-Anfrage, um das Formular schon vorauszufüllen
    $pk_artikel = $_GET['pk_artikel'];
    $sql = "SELECT Name, Preis, Bildlink, Beschreibung  FROM Artikel WHERE artikel.PK_Artikel = ?";
    $handle = fill_statement($sql, array($pk_artikel));
    $handle->execute();


    //$pk_artikel = $db_link->real_escape_string(trim($_GET['pk_artikel']));
    //$sqlrequest = "SELECT Name, Preis, Bildlink, Beschreibung  FROM Artikel WHERE artikel.PK_Artikel = '{$pk_artikel}'";
    //$erg = $db_link->query($sqlrequest) or die($db_link->error);

    if($handle->rowCount()==1)
    {
        $zeile = $handle->fetch();

        $name = $zeile->Name;
        $price = $zeile->Preis;
        $picturelink = $zeile->Bildlink;
        $description = $zeile->Beschreibung;
?>
        <html>
            <head>
                <title>Bearbeiten</title>
                <meta charset="UTF-8">
                <style>
                    div#nameError{
                        color: red;
                        display: none;
                    }
                    div#picturelinkError{
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
        
                <form action="http://localhost/_Repo/Druck3D/DB-Changes/editArtikelSubmit.php" method="GET" id="myForm">
    <?php           //Vorausgefülltes Formular zum Editieren des Artikels
                    echo "<label for='name'>Artikelname:</label><input name='name' id='name' type='text' size='15' maxlength='30' placeholder='Name' value='{$name}' title='Name des Artikels' required><div id='nameError'>Der Artikelname existiert bereits.</div><br>";
                    echo "<label for='price'>Preis:</label><input name='price' id='price' type='text' size='4' maxlength='7' pattern='[0-9]{0,4}(\.[0-9]{0,2})?' placeholder='0000.00' value='{$price}' title='Preis des Artikels'><br>";
                    echo "<label for='picturelink'>Bildpfad:</label><input name='picturelink' id='picturelink' type='text' size='30' maxlength='70' placeholder='C:\Beispielpfad\Beispielbild.png' value='{$picturelink}' title='Dateipfad des Artikelbildes'><div id='picturelinkError'>Der Bildpfad existiert bereits.</div><br>";
                    echo "<label for='description'>Beschreibung:</label><input name='description' id='description' type='text' placeholder='Dies ist ein Artikel' value='{$description}' title='Artikelbeschreibung'><br>";
                    echo "<input type='hidden' name='pk_artikel' id='pk_artikel' value='{$pk_artikel}'>";
                    echo "<input type='button' value='Speichern' onclick='validate()'>";
            echo "</form>";
    
?>
                <script>

                    function submitForm()
                    {
                        document.getElementById("myForm").submit();
                    }

                    const validate = () => {
                        //Reset UI
                        document.getElementById("nameError").style.display = "none";
                        document.getElementById("picturelinkError").style.display = "none";

                        const pk_artikel = document.getElementById('pk_artikel').value;
                        const name = document.getElementById("name").value;
                        const picturelink = document.getElementById("picturelink").value;

                        var a = $.ajax({
                        type: "GET",
                        url: 'Functions/validateArtikel.php',
                        data: { pk_artikel: pk_artikel,
                                name: name,
                                picturelink: picturelink,
                                edit: true
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
                            document.getElementById("nameError").style.display = "block";
                            document.getElementById("picturelinkError").style.display = "block";
                        }
                        else if(data == 2){
                            //alert('Der Artikelname existiert bereits');
                            document.getElementById("nameError").style.display = "block";
                        }
                        else if(data == 3)
                        {
                            //alert('Der Bildpfad existiert bereits');
                            document.getElementById("picturelinkError").style.display = "block";
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