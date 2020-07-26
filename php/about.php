
<?php
//Session abfrage http://localhost/Github/rep/Druck3D/Druck3DShop.php
include_once '../DB-Changes/Functions/fct_sqlconnect.php';
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
	<title>&Uuml;ber uns</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
    <!-- Custom JavaScript for this theme -->
    <script src="../js/scrolling-nav.js"></script>

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
                  echo "<a href='../DB-Changes/displayAllArtikel.php' class='nav-link' style='font-size:15px ;'></i>Admin</a>";
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
          <img class="card-img-banner" style="opacity: 0.2; height:200px" src="../img/IT_Background.jpg" alt="Card image">
          <div class="card-img-overlay">
            <div class="container">
              <img src="../img/Druck3D_3.JPG" width="58%" style="border-radius: 30px;" >
          </div>
          </div>
        </div>
      </div>
    </div>
  </header>


  <div class="text-center">
    <div>
      <div class="card text-black">
        <img class="card-img-banner" style="opacity: 0.7; height:600px" src="../img/White_Login_BG.png" alt="Card image">
        <div class="card-img-overlay">
            <div class="wrapper fadeInDown">
                <div id="formContent" style="min-width:700px; padding: 20px;">
                  <!-- Tabs Titles -->
              
                  <!-- Icon -->
                  <div class="fadeIn first" style="color:black;">
                        <h3> Das Leben wäre viel einfacher, wenn es nicht so schwer wäre.</h3>
                        <br> 
                        <p> Das ist unser Motto und daf&uumlr stehen unsere 3D Drucker 24/7 zur Verf&uumlgung um ihre Nachfrage durch unser Angebot zu s&aumlttigen.</p>
                        <br>
                        <p> <b> Hier aber noch ein paar coole Spr&uumlche zum mitnehmen: </b></p>
                        <br>
                        <p> Der Baum hat Äste, das ist das Beste. Denn wäre er kahl, dann wär's ein Pfahl. </p>
                        <br>
                        <p> Der Regenwurm wird sehr vermisst, weil er heute beim Angeln ist.</p>
                        <br>
                        <p> Folgt mir, ich weiß auch nicht wo es langgeht.</p>
                        <br>
                        <p>Vielen Dank! </p>



                  </div>
                </div>
              </div>
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
