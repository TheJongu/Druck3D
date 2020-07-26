<?php
  error_reporting(0);                                             //unterbindet die PHP-eigenen Fehlermeldungen

  include_once 'Functions/fct_sqlconnect.php';

  $sql = 'SELECT PK_Artikel, Name, Preis, Bildlink, Beschreibung  FROM Artikel';
  $handle = fill_statement($sql, array());
  $handle->execute();   //Liest die Datenbank aus

  //Session abfrage http://localhost/Github/rep/Druck3D/Druck3DShop.php
  include_once 'DB-Changes/Functions/fct_sqlconnect.php';
  session_start();
  $logged_in = false;
  if(isset($_SESSION['username']))
  {
    $logged_in = true;
  }

?>
  
<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="../css/style.css" rel="stylesheet"> <!-- Prioritaet vor BT-->
    <link href="../css/bootstrap.css" rel="stylesheet">

  
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src=".:/https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
    <!-- Custom JavaScript for this theme -->
    <script src="../js/scrolling-nav.js"></script>

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

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
    <div class="container">
      <ol class="navbar-nav mx-auto"> <!-- Ausrichtung angeben [mx-auto steht für Margin x für Center (r left und l right)] -->
        <li class="nav-item">
            <a class="navbar-brand js-scroll-trigger " href="../php/Druck3DShop.php">Druck 3D Shop</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
        </li>
        <?php
          if($logged_in)
          {
              echo "<ul class='navbar-nav justify-content'>";
                echo "<li class='nav-item'>";
                  echo "<p class='nav-link' style='color:white;text-align:center; white-space: nowrap; margin-bottom: 0px;'>Hallo {$_SESSION['username']}</p>";
                echo "</li>";
              echo "</ul>";
          }
        ?>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ol class="navbar-nav">
           <li class="nav-item search-bar">
           <form action="../php/Druck3DShop.php">
              <div class="input-group">
                  <input type="text" class="form-control mr-sm-2" placeholder="Search" name="search">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="fa fa-search"></i></button>
                  </div>
              </div>
            </form>
          </li> 
          <li class="nav-item">
            <a class="nav-link" style="white-space: nowrap;" href="../php/about.php">&Uumlber uns</a>
          </li>
          <?php
            if(!$logged_in)
            {
              echo "<li class='nav-item'>";
              echo "<a href='login.html' class='nav-link' style='color:white; white-space: nowrap'><i class='fa fa-user'></i> Login</a>";
              echo "</li>";
            }
            else
            {
              echo "<li class='nav-item'>";
              echo "<a href='../php/logout.php' class='nav-link' style='color:white; white-space: nowrap;'><i class='fa fa-user'></i> Logout</a>";
              echo "</li>";
              echo "<li class='nav-item'>";
                echo "<a href='../php/cart.php' class='nav-link' style='font-size:15px ;'></i>Warenkorb</a>";
                echo "</li>";
              if($_SESSION['sclass']==1)
              {
                echo "<li class='nav-item'>";
                echo "<a href='displayAllArtikel.php' class='nav-link' style='font-size:15px ;'></i>Admin</a>";
                echo "</li>";
                
              }
            }
          ?>
        </ol>
      </div>
    </div>
  </nav> 


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
      <form action="deleteArtikel.php">
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

  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
    <div class="container">
      <ol class="navbar-nav mx-auto"> <!-- Ausrichtung angeben [mx-auto steht für Margin x für Center (r left und l right)] -->
        <li class="nav-item">
        <form action="./insGetInput.html" method="GET">
          <input type="submit" value="Neuer Artikel">
        </form>
        </li>
        <li class="nav-item">
        <form action="./editSchlagworte.php" method="GET">
          <input type="submit" value="Schlagworte hinzufügen/löschen">
        </form>
        </li>
        <li class="nav-item">
        <form action="../php/Druck3DShop.php" method="GET">
          <input type="submit" value="Startseite">
        </form>
        </li>

        </ol>
      </div>
    </div>
  </nav> 
  
  
  </body>
</html>