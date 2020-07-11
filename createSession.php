<?php
    include 'fct_User.php';
    
    $username = $_POST['username'];

    header("Location: Druck3DShop.php");
    $sclass = get_Rechteklasse($username);
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['sclass'] = $sclass;
?>

<!--doctype html>
<html lang="en">
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
      <h1> Sie werden weitergeleitet...</h1>
  </head>
  <body>
  </body>

  </html-->