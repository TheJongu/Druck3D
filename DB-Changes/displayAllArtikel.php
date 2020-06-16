<form method="post" action="/Tests/Post/">      

    <?php
        
        error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen

        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'Druck3DDB';
    
        $db_link = new mysqli($host, $user, $password, $db);            //Verbindungsaufbau zur Datenbank

        $sqlrequest = 'SELECT Name, Preis, Bildlink, Beschreibung  FROM Artikel';

        $erg = $db_link->query($sqlrequest) or die($db_link->error);    //Liest die Datenbank aus

echo "Connected";

        while ($zeile = $erg->fetch_object())                           //fetch_object liefert ein object, welches die Inhalte der DB-Zeile enthält
    {
       ?>
       
       <html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}

th, td {
  padding: 10px;
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
    </tr>
    <tr>
    
    <?php  


      echo "<td>{$zeile->Name}</td>";
      echo "<td>{$zeile->Preis}</td>";
      echo "<td>{$zeile->Bildlink}</td>";
      echo "<td>{$zeile->Beschreibung}</td>";

      
$sqlRequestGetSchlagworte = 'SELECT Schlagworte FROM Artikel, ArtikelSchlagworte, Schlagworte WHERE {$zeile->Pk_Artikel} = Artikelschlagworte.';

      $erg = $db_link->query($sqlrequest) or die($db_link->error);    //Liest die Datenbank aus

    ?>

    </tr>
</table>

</body>
</html>

      
    <?php        
        }
    ?>
       
</form>