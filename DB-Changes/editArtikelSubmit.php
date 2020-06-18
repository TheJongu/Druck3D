<?php
    include_once 'Functions/fct_editArtikel.php';
    //Eingaben absichern
    $pk_artikel = $_GET['pk_artikel'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    $picturelink = $_GET['picturelink'];
    $description = $_GET['description'];

    $output = editArtikel($pk_artikel, $name, $price, $picturelink, $description);

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