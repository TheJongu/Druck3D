<?php
    include 'Functions/fct_insertArtikel.php';

    $name = $_GET['name'];
    $price = $_GET['price'];
    $picturelink = $_GET['picturelink'];
    $description = $_GET['description'];

    $output = insertArtikel($name, $price, $picturelink, $description);

    if($output==1)
    {
        header("Location: http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php");
    }
    else
    {
        echo $output."<br>";
?>
        <button onclick="goBack()">Bearbeiten</button>

        <form action="http://localhost/_Repo/Druck3D/DB-Changes/displayAllArtikel.php">
            <input type="submit" value="Abbrechen" position="absolute" left=100px>
        </form>

        <script>
        function goBack() {
        window.history.back();
        }
        </script>
<?php
    }
?>