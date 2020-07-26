
<?php
//Session abfrage http://localhost/Github/rep/Druck3D/Druck3DShop.php
include_once 'DB-Changes/Functions/fct_sqlconnect.php';
session_start();
$logged_in = false;
if (isset($_SESSION['username'])) {
    $logged_in = true;
}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Druck3DShop</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="css/style.css" rel="stylesheet"> <!-- Prioritaet vor BT-->
  <link href="css/bootstrap.css" rel="stylesheet">

  
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

    <!-- 
    <script>
      // Check if Session exists via Ajax 
      $(document).ready(function(){
         $.ajax({
              url:'login.php',
              type:'GET', 
              data:"parameter=some_parameter", //Session is set abfrage
             success:function(data)
             {
               //Session start
                    $("#thisdiv").html(data);
                 }
          });
      });
      </script>

    -->


  </head>
  <body>
  
          <!-- Navigation -->
   
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <ol class="navbar-nav mx-auto"> <!-- Ausrichtung angeben [mx-auto steht für Margin x für Center (r left und l right)] -->
        <li class="nav-item">
            <a class="navbar-brand js-scroll-trigger " href="Druck3DShop.php">Druck 3D Shop</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
        </li>
        <?php if ($logged_in) {
            echo "<ul class='navbar-nav justify-content'>";
            echo "<li class='nav-item'>";
            echo "<p class='nav-link' style='color:white;text-align:center; white-space: nowrap; margin-bottom: 0px;'>Hallo {$_SESSION['username']}</p>";
            echo "</li>";
            echo "</ul>";
        } ?>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ol class="navbar-nav">
           <li class="nav-item search-bar">
            <form>
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
            <a class="nav-link" style="white-space: nowrap;" href="about.php">&Uumlber uns</a>
          </li>
          <?php if (!$logged_in) {
              echo "<li class='nav-item'>";
              echo "<a href='login.php' class='nav-link' style='color:white; white-space: nowrap'><i class='fa fa-user'></i> Login</a>";
              echo "</li>";
          } else {
              echo "<li class='nav-item'>";
              echo "<a href='logout.php' class='nav-link' style='color:white; white-space: nowrap;'><i class='fa fa-user'></i> Logout</a>";
              echo "</li>";
              echo "<li class='nav-item'>";
              echo "<a href='cart.php' class='nav-link' style='font-size:15px ;'></i>Warenkorb</a>";
              echo "</li>";
              if ($_SESSION['sclass'] == 1) {
                  echo "<li class='nav-item'>";
                  echo "<a href='DB-Changes/displayAllArtikel.php' class='nav-link' style='font-size:15px ;'></i>Admin</a>";
                  echo "</li>";
              }
          } ?>
        </ol>
      </div>
    </div>
  </nav> 


  <header>
    <div class="text-center">
      <div>
        <div class="card bg-dark text-white"  style="width: 101%;">
          <img class="card-img-banner" style="opacity: 0.2; height:200px" src="img/IT_Background.jpg" alt="Card image">
          <div class="card-img-overlay">
            <div class="container">
              <img src="img/Druck3D_3.JPG" width="58%" style="border-radius: 30px;" >
          </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <script>
    // Warenkorb Session abfrage (wenn eingeloggt, zeige sein Warenkorb an)
  </script>


    <!-- Filter 
    <div class="container-background ">
      <h2>Filter</h2>
      <input class="form-control" id="myInput" type="text" placeholder="Filtern nach..">
      <div id="myDIV">
                <!-- alle Items nach dennen gefiltert werden sollen-->

    <!-- Artikel-Grid-->

    <!-- Beschraenkung auf 4 Rows per Seite, 1. Seite/Hauptseite hat ein Slider, die anderen nicht.-->

    <div class = "container-background" style="background-color: #EAEDED;">
      <div class="container">
        <div>
          <div class="card  text-white">
            <img class="card-img-banner" style="height:1865px; " src="img/Blue_Background_2.jpg" alt="Card image">
            <div class="card-img-overlay">
              <div class="row">

                <!-- Image Slider-->
                <div class="col-md-12">
                      <?php
                      $sql = "SELECT PK_Artikel, Name, Preis, Bildlink FROM artikel WHERE Onsale = 1";
                      $handle = fill_statement($sql, []);
                      $handle->execute();

                      if ($handle->rowCount() > 0) { ?>
                          <h1 class="text-center" style="padding-bottom: 15px;"> Diese Woche im Angebot!</h1>
                            <div id="slides" class="carousel slide" data-ride="carousel">
                              <ol class='carousel-indicators'>
                        <?php
                        $firsttime = true;
                        for ($zaehler = 0; $zaehler < $handle->rowCount(); $zaehler++) {
                            //Slidenavigierer
                            if ($firsttime) {
                                echo "<li data-target='#slides' data-slide-to='{$zaehler}' class='active'></li>";
                            } else {
                                echo "<li data-target='#slides' data-slide-to='1'> </li>";
                            }
                        }
                        echo "</ol>";
                        echo "<div class='carousel-inner col-md-3' style='padding-right: 5px; padding-top: 0px;'>";
                        $firsttime = true;
                        while ($zeile = $handle->fetch(PDO::FETCH_OBJ)) {
                            //Einzelnen Bilder der Artikel im Angebot
                            if ($firsttime) {
                                echo "<div class='carousel-item active'>";
                                echo "<div class='card data' style='width: 16rem'>";
                                echo "<img class='card-img-top' src='{$zeile->Bildlink}' alt='Card image cap'>";
                                echo "<div class='card-body' style='height: 6rem;'>";
                                echo "<ul class='list-group list-group-flush'>";
                                echo "<li class='list-group-item'><h5 class='card-title text-center'> <a href='viewArticle.php?pk_artikel={$zeile->PK_Artikel}' class='card-link'>{$zeile->Name}</a><p> {$zeile->Preis}</p></h5></li>";
                                echo "</ul>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            } else {
                                echo "<div class='carousel-item'>";
                                echo "<div class='card data' style='width: 16rem'>";
                                echo "<img class='card-img-top' src='{$zeile->Bildlink}' alt='Card image cap'>";
                                echo "<div class='card-body' style='height: 6rem;'>";
                                echo "<ul class='list-group list-group-flush'>";
                                echo "<li class='list-group-item'><h5 class='card-title text-center'> <a href='viewArticle.php?pk_artikel={$zeile->PK_Artikel}' class='card-link'>{$zeile->Name}</a><p> {$zeile->Preis}</p></h5></li>";
                                echo "</ul>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                            $firsttime = false;
                        }
                        ?>
                          <!--Slidersteuerung-->
                          </div>
                            <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                          </div>
                        <?php }
                      ?>
                  </div>

              <?php
              //Wenn eine Suchanfrage gemacht wurde
              if (isset($_GET['search']) && $_GET['search'] != "") {
                  $search = $_GET['search'];
                  $sqlPK_Schlagwort = "SELECT PK_Schlagwort FROM schlagworte WHERE Schlagwort=?";
                  $handlePK_Schlagwort = fill_statement($sqlPK_Schlagwort, [$search]);
                  $handlePK_Schlagwort->execute();

                  if ($handlePK_Schlagwort->rowCount() > 0) {
                      //Es wurden Artikel zum Schlagwort gefunden
                      $zeilePK_Schlagwort = $handlePK_Schlagwort->fetch(PDO::FETCH_OBJ);
                      $pk_schlagwort = $zeilePK_Schlagwort->PK_Schlagwort;
                      //Gebe die FK_Artikel für alle Artikel mit dem Schlagwort
                      $sqlFK_Artikel = "SELECT FK_Artikel FROM artikelschlagworte WHERE FK_Schlagwort=?";
                      $handleFK_Artikel = fill_statement($sqlFK_Artikel, [$pk_schlagwort]);
                      $handleFK_Artikel->execute();
                      //Aus dem Array ein String für das SQL Statement machen
                      $fk_artikelArray = [];
                      while ($zeileFK_Artikel = $handleFK_Artikel->fetch(PDO::FETCH_OBJ)) {
                          $fk_artikelArray[] = $zeileFK_Artikel->FK_Artikel;
                      }
                      $fk_artikelString = implode(",", $fk_artikelArray);
                      //Alle Artikel, die das gesuchte Schlagwort haben oder der Name gleich der Suchanfrage ist
                      $sql = "SELECT PK_Artikel, Name, Preis, Bildlink FROM Artikel WHERE PK_Artikel IN ({$fk_artikelString}) OR Name=?";
                  }
                  //Es gibt kein Artikel mit dem gesuchten Schlagwort, deshalb wird nur auf Name überprüft
                  else {
                      $sql = "SELECT PK_Artikel, Name, Preis, Bildlink FROM Artikel WHERE Name=?";
                  }
                  $handle = fill_statement($sql, [$search]);
              }
              //STANDARFAUFBAU DER SEITE
              else {
                  $sql = "SELECT PK_Artikel, Name, Preis, Bildlink FROM Artikel";
                  $handle = fill_statement($sql, []);
              }

              //Bestimme Produktseite anzeigen
              if (isset($_GET['Seite'])) {
                  $seite = intval($_GET['Seite']);
                  $limitu = 1 + 12 * ($seite - 1);
                  $limito = $limitu + 11;
              }
              //Hauptseite
              else {
                  $limitu = 1;
                  $limito = 12;
              }
              $i = 1;
              $articleshown = false;

              $handle->execute();
              while ($zeile = $handle->fetch(PDO::FETCH_OBJ)) {
                  if ($i >= $limitu && $i <= $limito) {
                      $articleshown = true; ?>
                  <div class="col-md-3">
                    <div class="card data" style="width: 16rem">
                      <?php echo "<img class='card-img-top' src='{$zeile->Bildlink}' alt='Card image cap'>"; ?>
                      <div class="card-body">
                        <!-- Artikelname Maximal 44 Zeichen!-->
                        <ul class="list-group list-group-flush">    <!-- Link sollte eine JQuery anfrage sein, damit man die Methode 'POST' machen kann-->
                          <?php
                          echo "<li class='list-group-item'><h5 class='card-title text-center'> <a href='viewArticle.php?pk_artikel={$zeile->PK_Artikel}' class='card-link'>{$zeile->Name}</a></h5></li>";
                          echo "<li class='list-group-item text-center'>{$zeile->Preis} €</li>";
                          ?>
                        </ul>
                      </div>  
                    </div>
                  </div>
                  <?php
                  }
                  $i++;
              }
              if (!$articleshown) {
                  echo "<p>Keine Artikel gefunden...</p>";
              }
              ?>

                  <!--
                  <div class="item">
                    <img class="img-fluid" src="img/Ente_1.jpg" alt="First slide" width="300" height="300">
                  </div>
                  <div class="data">
                    <div class="category">
                      <p> KATEGORIE (illegal)</p>
                    </div>
                    <h3> Artikelbeschreibung >>ENTE>> </h3>
                    <p style="font-size: 25px;"><b> 5,00€ </b></p>
                  </div>
                </div>-->

                
            
            </div>
              <!-- Page Navigation -->
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <?php if (isset($_GET['Seite'])) {
                      $seite = intval($_GET['Seite']);
                      $previous = $seite - 1;
                      $next = $seite + 1;
                      if ($previous < 1) {
                          $previous = 1;
                      }
                      if ($next > 3) {
                          $next = 3;
                      }
                  } else {
                      $next = 2;
                      $previous = 1;
                  } ?>
                  <?php echo "<li class='page-item'><a class='page-link' href='?Seite={$previous}'>Previous</a></li>"; ?>
                  <li class="page-item"><a class="page-link" href="Druck3DShop.php">1</a></li>
                  <li class="page-item"><a class="page-link" href="?Seite=2">2</a></li>
                  <li class="page-item"><a class="page-link" href="?Seite=3">3</a></li>
                  <?php echo "<li class='page-item'><a class='page-link' href='?Seite={$next}'>Next</a></li>"; ?>
                </ul>
              </nav>



            
          </div>

        </div>

      </div>
      
  <!-- Filter Ende-->
  </div>

  </div>

<!-- Container Ende-->
</div>

<!--div>
  <h1> Button </h1>
  <form method="get" name="form" action="newarticle.php"> 
    <input type="text" placeholder="Enter Data" name="newsite"> 
    <input type="submit" value="Submit"> 
</form> 
</div-->




  <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        $("#myDIV *").filter($("div.item div.data"));
      });
    });
    </script>


  <footer class="page-footer font-small indigo">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">
  
      <!-- Grid row -->
      <div class="row">
  
        <!-- Grid column -->
        <div class="col-md-3 mx-auto">
  
          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">&Uuml;ber Druck3DShop</h5>
  
          <ul class="list-unstyled">
            <li>
              <a href="contact.php">Kontakt</a>
            </li>
            <li>
              <a href="default.php">Karriere bei Druck3DShop</a>
            </li>
            <li>
              <a href="default.php">&Uuml;ber uns</a>
            </li>
            <li>
              <a href="default.php">Nachhaltigkeit</a>
            </li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-3 mx-auto">
  
          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Geld verdienen mit 3D-Druck</h5>
  
          <ul class="list-unstyled">
            <li>
              <a href="default.php">jetzt verkaufen</a>
            </li>
            <li>
              <a href="default.php">Versand durch Druck3DShop</a>
            </li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-3 mx-auto">
  
          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Zahlungsarten</h5>
  
          <ul class="list-unstyled">
            <li>
              <a href="default.php">Druck3D Visa Karte</a>
            </li>
            <li>
              <a href="default.php">Gutscheine</a>
            </li>
            <li>
              <a href="default.php">Bankeinzug</a>
            </li>
          </ul>
  
        </div>
  
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="about.php"> Druck3DShop</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->

  </body>
</html>
