<?php
    include_once 'Functions/fct_Artikel.php';

    $pk_artikel = $_GET['pk_artikel'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    $onsale = 0;
    $picturelink = $_GET['picturelink'];
    $description = $_GET['description'];

    if(isset($_GET['onsale']))
    {
        $onsale = 1;
    }

    editArticle($pk_artikel, $name, $price, $picturelink, $description, $onsale);

    if(true)
    {
        header("Location: ./displayAllArtikel.php");
    }
    else
    {
?>
        <html>
            <head>
                <title>Fehler</title>
                <meta charset="UTF-8">
            </head>
            <body>
                <p>Das editieren hat nicht geklappt. Bitte wenden Sie sich an unseren Support.</p>

                <button onclick="goBack()">Bearbeiten</button>
                <button>Kundensupport</button>
                <form action="./displayAllArtikel.php">
                    <input type="submit" value="Abbrechen" position="absolute" left=100px>
                </form>

                <script>
                function goBack() {
                window.history.back();
                }
                </script>
            </body>
        </html>
<?php
    }
?>