<?php

    session_start();
    require_once("modelo.php");

    if($_GET["opcion"] == 1)
    {
        echo getCantidades(); 
    }
    
    if($_GET["opcion"] == 2)
    {
        echo getZombiesRegistrados(); 
    }
    
    if($_GET["opcion"] == 3)
    {
        echo getZombiesPorEstado($_GET["estadoConsultar"]); 
    }
    
    if($_GET["opcion"] == 4)
    {
        $_SESSION["nombreGoogle"] = $_GET["nombreGoogle"];
        echo $_SESSION["nombreGoogle"];
    }
    
?>