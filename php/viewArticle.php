<?php
include_once '../DB-Changes/Functions/fct_sqlconnect.php';
session_start();
$logged_in = false;
if (isset($_SESSION['username'])) {
    $logged_in = true;
}

$pk_artikel = $_GET['pk_artikel'];

$sql = "SELECT PK_Artikel, Name, Preis, Bildlink, Beschreibung FROM Artikel WHERE artikel.PK_Artikel = ?";
$handle = fill_statement($sql, [$pk_artikel]);
$handle->execute();
$zeile = $handle->fetch(PDO::FETCH_OBJ);
?>

<!Doctype html>
<html>
    <head>
        <?php echo "<title>{$zeile->Name}</title>"; ?>
        <meta charset="utf-8">
         <!-- Required meta tags -->
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Artikelseite</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

      
                  <!-- Material Design Boostrap-->
            <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet" >
            <link href="../css/style.css" rel="stylesheet"> <!-- Prioritaet vor BT-->
            <link href="../css/mdb.css" rel="stylesheet" >
            <link href="../css/bootstrap.css" rel="stylesheet">






        
            <!-- Bootstrap core JavaScript -->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
            <!-- Plugin JavaScript -->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
            <!-- Custom JavaScript for this theme -->
            <script src="../js/scrolling-nav.js"></script>

            </head>

            <!--
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
    -->


    <body>

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
           <form action="Druck3DShop.php">
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
        <img class="card-img-banner" style="opacity: 0.2; height:200px" src="../img/background/IT_Background.jpg" alt="Card image">
          <div class="card-img-overlay">
            <div class="container">
              <img src="../img/background/Druck3D_3.JPG" width="58%" style="border-radius: 30px;" >
          </div>
          </div>
        </div>
      </div>
    </div>
  </header>


  <div class="card  text-black">
            <img class="card-img-banner" style="height:500px; " src="../img/background/White_Background.jpg" alt="Card image">
            <div class="card-img-overlay">
              <div class="row">
                <div class="col-md-6">
                    <?php echo "<img src='../{$zeile->Bildlink}' alt='{$zeile->Name}' class='rounded mx-auto d-block animated bounceIn'style='height:350px'>"; ?>
                    </div>
                <div class="col-md-6">
                    <?php
                    echo "<h1>{$zeile->Name}</h1>";
                    echo "<hr>";
                    echo "<h3>Beschreibung</h3>";
                    echo "<p>{$zeile->Beschreibung}</p>";
                    echo "<h3>Preis {$zeile->Preis} €</h3>";
                    if ($logged_in) { ?>  
                    <form action="addusercart.php" method="GET">
                      <?php echo "<input type='hidden' name='pk_artikel' value='{$zeile->PK_Artikel}'>"; ?>
                      <?php echo "<input type='hidden' name='pk_nutzer' value='{$_SESSION['userid']}'>"; ?>
                      <input type="submit" value="In den Warenkorb">
                    </form>
                    <?php } else { ?>
                      <form action="login.php" method="GET">
                      <input type="submit" value="In den Warenkorb">
                    </form>


                      <?php }
                    ?>
                    </div>


            </div>
    </div>
    </div>
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
                      <a href="default.php">Karriere bei Druck3DShop</a>
                    </li>
                    <li>
                      <a href="about.php">&Uuml;ber uns</a>
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
              <a href="Druck3DShop.php"> Druck3DShop</a>
            </div>
            <!-- Copyright -->
          
          </footer>
          <!-- Footer -->



    </body>


</html>