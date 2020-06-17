    <?php
        
        error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen

        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'Druck3DDB';
    
        $db_link = new mysqli($host, $user, $password, $db);            //Verbindungsaufbau zur Datenbank

        $sqlrequest = 'SELECT PK_Artikel, Name, Preis, Bildlink, Beschreibung  FROM Artikel';

        $erg = $db_link->query($sqlrequest) or die($db_link->error);    //Liest die Datenbank aus

     
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

/* The popup form - hidden by default */
.form-popup {
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

while ($zeile = $erg->fetch_object())                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
{
      echo "<td>{$zeile->Name}</td>";
      echo "<td>{$zeile->Preis}</td>";
      echo "<td>{$zeile->Bildlink}</td>";
      echo "<td>{$zeile->Beschreibung}</td>";
      
      
      $sqlRequestGetSchlagworte = "SELECT DISTINCT Schlagwort FROM schlagworte, artikel, artikelschlagworte where artikelschlagworte.FK_Artikel = {$zeile->PK_Artikel} and artikelschlagworte.FK_Schlagwort = schlagworte.PK_Schlagworte";
      $sqlRequestGetSchlagworteErg = $db_link->query($sqlRequestGetSchlagworte) or die($db_link->error);    //Liest die Datenbank aus
      
      echo "<td>";
      
      $setCommaFlag = false;
      while($AnfrageSchlagworte = $sqlRequestGetSchlagworteErg->fetch_object()){
        
        if($setCommaFlag){
        echo ", ";
        }
        echo "{$AnfrageSchlagworte->Schlagwort}";
        $setCommaFlag = true;
      }
      echo "</td>";
      

    echo '<td>';
      ?>
      <form action="checkboxesForSchlagwort.php" method="GET">
      <?php echo "<input type='hidden' name='pk_Artikel' value='{$zeile->PK_Artikel}'>"; ?>
      <input type="submit" value="Editiere Schlagworte">
      </form>
      <?php
    echo "</td>";
    echo "<td>";
    
    echo "<button class='open-button' onclick='openForm({$theZaehler})'>Loeschen</button>";
    
    echo "<div class='form-popup' id='myForm{$theZaehler}'>";
    ?>
  <form action="http://localhost/_Repo/Druck3D/DB-Changes/delete.php" class="form-container">
    <p>Wollen Sie den Artikel wirklich loeschen?</p>

    <?php echo "<input type='hidden' name='pk_Artikel' value='{$zeile->PK_Artikel}'>"; ?>

    <button type="submit" class="btn">Ja</button>
    <?php echo "<button type='button' class='btn cancel' onclick='closeForm({$theZaehler})'>Nein</button>"; ?>
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
function openForm(p1) {
  var myForm = "myForm" + p1;
  document.getElementById(myForm).style.display = "block";
}

function closeForm(p1) {
  var myForm = "myForm" + p1;
  document.getElementById(myForm).style.display = "none";
}
</script>

    <form action="http://localhost/_Repo/Druck3D/DB-Changes/insert.html" method="GET">
      <input type="submit" value="Neuer Artikel">
    </form>

    </body>
</html>