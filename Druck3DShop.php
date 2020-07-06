
<?php
//Session abfrage http://localhost/Github/rep/Druck3D/Druck3DShop.php
include_once 'DB-Changes/Functions/fct_sqlconnect.php';
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Complete Bootstrap 4 Website Layout</title>
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


  </head>
  <body>
  
          <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <ol class="navbar-nav mr-auto"> <!-- Ausrichtung angeben [mx-auto steht für Margin x für Center (r left und l right)] -->
        <li class="nav-item">
            <a class="navbar-brand js-scroll-trigger " href="Druck3DShop.html">Druck 3D Shop</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
        </li>
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
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav justify-content-right">
          <li class="nav-item">
            <a class="nav-link" href="about.html">&Uumlber uns</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.html">Kontakt</a>
          </li>
            <li class="nav-item">
              <a href="login.html" class="nav-link" style="color:white"><i class="fa fa-user"></i> Login</a>
            </li>            
        </ul>
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
                  <h1 class="text-center" style="padding-bottom: 15px;"> Diese Woche im Angebot!</h1>
                  <div id="slides" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#slides" data-slide-to="0" class="active"></li>
                      <li data-target="#slides" data-slide-to="1"> </li>
                      <li data-target="#slides" data-slide-to="2"> </li>
                    </ol> 
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block d-100 mx-auto" src="img/Ente_1.jpg" alt="First slide" width="300" height="300">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block d-100 mx-auto" src="img/Ente_2.jpg" alt="Second slide" width="300" height="300">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block d-100 mx-auto" src="img/Ente_3.jpg" alt="Third slide" width="300" height="300">
                    </div>
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
              </div>


                <!-- Artikel-->
                <div class="col-md-3">
                  <div class="card data" style="width: 16rem;">
                    <img class="card-img-top" src="img/Ente_1.jpg" alt="Card image cap">
                    <div class="card-body">
                      <!-- Artikelname Maximal 44 Zeichen!-->
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><h5 class="card-title text-center"> <a href="#" class="card-link">Super sueße Gumminente Mashalla die H&uumlbsche ich k&uumlss dein Auge</a></h5></li>
                        <li class="list-group-item text-center">5,00€</li>
                      </ul>
                    </div>
                  </div>
                </div>

<?php
                $sql = 'SELECT PK_Artikel, Name, Preis, Bildlink FROM Artikel';
                $handle = fill_statement($sql, array());
                $handle->execute();

                while ($zeile = $handle->fetch(PDO::FETCH_OBJ))
                {
                  ?>
                  <div class="col-md-3">
                    <div class="card data" style="width: 16rem">
                      <?php echo "<img class='card-img-top' src='{$zeile->Bildlink}' alt='Card image cap'>"; ?>
                      <div class="card-body">
                        <!-- Artikelname Maximal 44 Zeichen!-->
                        <ul class="list-group list-group-flush">
                          <?php echo "<li class='list-group-item'><h5 class='card-title text-center'> <a href='#' class='card-link'>{$zeile->Name}</a></h5></li>";
                                echo "<li class='list-group-item text-center'>{$zeile->Preis}</li>";?>
                        </ul>
                      </div>  
                    </div>
                  </div>
                  <?php
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
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
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

<div>
  <h1> Button </h1>
  <form method="get" name="form" action="newarticle.php"> 
    <input type="text" placeholder="Enter Data" name="newsite"> 
    <input type="submit" value="Submit"> 
</form> 
</div>




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
              <a href="default.html">Karriere bei Druck3DShop</a>
            </li>
            <li>
              <a href="default.html">&Uuml;ber uns</a>
            </li>
            <li>
              <a href="default.html">Nachhaltigkeit</a>
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
              <a href="default.html">jetzt verkaufen</a>
            </li>
            <li>
              <a href="default.html">Versand durch Druck3DShop</a>
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
              <a href="default.html">Druck3D Visa Karte</a>
            </li>
            <li>
              <a href="default.html">Gutscheine</a>
            </li>
            <li>
              <a href="default.html">Bankeinzug</a>
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
      <a href="https://Druck3DShop.com/About"> Druck3DShop</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->

  </body>
</html>
