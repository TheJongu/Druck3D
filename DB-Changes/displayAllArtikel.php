<?php
  error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen

  include_once 'Functions/fct_sqlconnect.php';

  $sql = 'SELECT PK_Artikel, Name, Preis, Bildlink, Beschreibung  FROM Artikel';
  $handle = fill_statement($sql, array());
  $handle->execute();   //Liest die Datenbank aus
?>
  
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Datenbank</title>
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
        <th>Schlagworte</th>
        <th></th>
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
                    
          $sqlGetSchlagworte = "SELECT DISTINCT Schlagwort FROM schlagworte, artikel, artikelschlagworte where artikelschlagworte.FK_Artikel = ? and artikelschlagworte.FK_Schlagwort = schlagworte.PK_Schlagwort";
          $handleGetSchlagworte = fill_statement($sqlGetSchlagworte, array($zeile->PK_Artikel));
          $handleGetSchlagworte->execute();
              
          echo "<td>";
              
          $setCommaFlag = false;
          while($AnfrageSchlagworte = $handleGetSchlagworte->fetch(PDO::FETCH_OBJ)){
                
            if($setCommaFlag){
              echo ", ";
            }
            echo "{$AnfrageSchlagworte->Schlagwort}";
            $setCommaFlag = true;
          }
          echo "</td>";
          echo "<td>";
      ?>
      <form action="schlagwortCheckboxes.php" method="GET">
        <?php echo "<input type='hidden' name='pk_Artikel' value='{$zeile->PK_Artikel}'>"; ?>
        <input type="submit" value="Editiere Schlagworte">
      </form>
      <?php
        echo "</td>";
        echo "<td>";
    
        echo "<button onclick='openDelete({$theZaehler})'>Loeschen</button>";  
        echo "<div class='delete-popup' id='delete{$theZaehler}'>";
      ?>
      <form action="./deleteArtikel.php">
        <p>Wollen Sie den Artikel wirklich loeschen?</p>
        <?php echo "<input type='hidden' name='pk_artikel' value='{$zeile->PK_Artikel}'>"; ?>
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

      <?php
      
        if($_GET['output']!=null)
        {
          $output = $_GET['output'];
          echo "<p>{$output}</p>";
        }
      ?>

    <form action="./insGetInput.html" method="GET">
      <input type="submit" value="Neuer Artikel">
    </form>
    <form action="./editSchlagworte.php" method="GET">
      <input type="submit" value="Schlagworte hinzufügen/löschen">
    </form>
  </body>
</html>