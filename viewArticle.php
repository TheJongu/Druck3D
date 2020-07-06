<?php
    include_once 'DB-Changes/Functions/fct_sqlconnect.php';

    $pk_artikel = $_GET['pk_artikel'];

    $sql = "SELECT Name, Preis, Bildlink, Beschreibung FROM Artikel WHERE artikel.PK_Artikel = ?";
    $handle = fill_statement($sql, array($pk_artikel));
    $handle->execute();
    $zeile = $handle->fetch(PDO::FETCH_OBJ);
?>

<!Doctype html>
<html>
    <head>
        <?php echo "<title>{$zeile->Name}</title>"; ?>
        <meta charset="utf-8">
    </head>
    <style>
        img {
            border-radius: 8px;
            max-width: 30vw;
        }
        .eumelFINN {
            justify-content: flex-end;
            width: 80vw;
            margin: auto;
        }
    </style>
    <body>
        <div class="eumelFINN">
        <?php
            echo "<h1>{$zeile->Name}</h1>"; 
            echo "<img src='{$zeile->Bildlink}' alt='{$zeile->Name}'>";
            echo "<br><br>";
            echo "<h3>Beschreibung</h3>";
            echo "<p>{$zeile->Beschreibung}</p>";
            echo "<h3>Preis {$zeile->Preis} €</h3>";
        ?>
        </div>
    </body>
</html>