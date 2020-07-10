<?php
    header("Location: Druck3DShop.php");
    session_start();
    $_SESSION = array();
    session_destroy();  
?>