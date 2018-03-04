<?php
    session_start();
    require_once("modelo.php");

    if(isset($_POST["yardas"]))
    {
        
        include("partials/_header.html");
        
        $highYardPlayers = getHighYardPlayers($_POST["yardas"]);
        
        include("partials/_dentroForm.html");
        include("partials/_footer.html"); 
    }

?>