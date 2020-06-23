<?php
    include_once 'Functions/fct_Artikel.php';

    $name = $_GET['name'];
    $price = $_GET['price'];
    $picturelink = $_GET['picturelink'];
    $description = $_GET['description'];

    $output = insertArtikel($name, $price, $picturelink, $description); //output beinhaltet die Rückmeldung von inserArtikel()

    if($output==1)  //Ohne Fehler ist $output die Anzahl der beeinflussten Datensätze
    {
        header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
    }
    else            //Mit Fehler ist $output die Fehlermeldung
    {
?>
        <html>
            <head>
                <title>Fehler</title>
                <meta charset="UTF-8">
            </head>
            <body>
 
        <?php echo $output."<br>"; ?>

            <button onclick="goBack()">Bearbeiten</button>

            <form action="http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php">
                <input type="submit" value="Abbrechen" position="absolute" left=100px>
            </form>

            <script>
            function goBack() {
            window.history.back();
            }
            </script>
        </html>
    </body>
<?php
    }
?>