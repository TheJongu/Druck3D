<?php
    include_once 'Functions/fct_Artikel.php';

    $name = $_GET['name'];
    $price = $_GET['price'];
    $picturelink = $_GET['picturelink'];
    $description = $_GET['description'];

    $output = insertArticle($name, $price, $picturelink, $description);

    if($output)  
    {
        header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
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
                <p>Das einfuegen in die Datenbank hat nicht geklappt. Bitte wenden Sie sich an unseren Support</p>
                <button onclick="goBack()">Bearbeiten</button>
                <button>Kundensupport</button>
                <form action="http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php">
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