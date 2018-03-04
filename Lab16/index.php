<?php
    session_start();
    if(isset($_SESSION["nombre"]) ) {
        header("location: login.php");    
    } else {
        include("partials/_header.html");
        include("partials/_form.html");
        include("partials/_footer.html");
    }

//    $yardas = 0;
//    $highYardPlayers = "";
?>