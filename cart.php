<?php
    

//  error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen

  include_once 'DB-Changes/Functions/fct_sqlconnect.php';

  include_once 'DB-Changes/Functions/fct_warenkorb.php';
  session_start();
  
  echo "Das ist ihr Warenkorb.";
  echo "<br>Sie haben folgende Gegenstände in ihrem Warenkorb";
  $sql = 'SELECT PK_Artikel, Name, Preis, Bildlink, Beschreibung FROM artikel, warenkorbartikel, nutzer WHERE artikel.PK_Artikel = warenkorbartikel.FK_Artikel AND nutzer.PK_Nutzer = warenkorbartikel.FK_Nutzer AND nutzer.PK_Nutzer = ?;';
  $handle = fill_statement($sql, array($_SESSION['userid']));
  $handle->execute();

?>
  
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Warenkorb</title>
    <style>
      table, th, td {
        border: 1px solid black;
      }

      th, td {
        padding: 10px;
      }

      /* Darf NICHT geloescht werden, 'Loeschen' Popup*/
      .delete-popup {
        display: none;
      }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <th>Name</th>
        <th>Preis</th>
        <th>Bildlink</th>
        <th>Beschreibung</th>
        <th></th>
      </tr>
      <tr>

      <?php
        $theZaehler = 0;
        while ($zeile = $handle->fetch(PDO::FETCH_OBJ))                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
        {
          echo "<td><a href='./editArtikel.php?pk_artikel={$zeile->PK_Artikel}' title='Artikel bearbeiten'>{$zeile->Name}</a></td>";
          echo "<td>{$zeile->Preis}</td>";
          echo "<td>{$zeile->Bildlink}</td>";
          echo "<td>{$zeile->Beschreibung}</td>";
         
          echo "</td>";
          echo "<td>";
      ?>
      <?php
    
        echo "<button onclick='openDelete({$theZaehler})'>Loeschen</button>";  
        echo "<div class='delete-popup' id='delete{$theZaehler}'>";
      ?>
      <form action="./delcartarticle.php">
        <p>Wollen Sie den Artikel wirklich aus ihrem Warenkorb auf den Boden legen? Was auf dem Boden liegt muss desinfiziert werden. Danach wird das Produkt verbrannt.</p>
        <?php echo "<input type='hidden' name='pk_artikel' value='{$zeile->PK_Artikel}'>"; ?>
        <?php echo "<input type='hidden' name='pk_nutzer' value='{$_SESSION['userid']}'>"; ?>
        <button type="submit" class="btn">Ja</button>
        <?php echo "<button type='button' onclick='closeDelete({$theZaehler})'>Nein</button>"; ?>
      </form>
      
      </div>

      <?php
        echo "</td>";
        echo "</tr>";
        $theZaehler++;
        }
      ?>

    </table>

    <script>
      function openDelete(p1) {
        var myForm = "delete" + p1;
        document.getElementById(myForm).style.display = "block";
      }

      function closeDelete(p1) {
        var myForm = "delete" + p1;
        document.getElementById(myForm).style.display = "none";
      }
    </script>

    <form action="Druck3DShop.php" method="GET">
      <input type="submit" value="Startseite">
    </form>
    <form action="deliverEmail.php" method="GET">
      <input type="submit" value="ALLES KAUFEN, SOFORT">
    </form>
  </body>
</html>