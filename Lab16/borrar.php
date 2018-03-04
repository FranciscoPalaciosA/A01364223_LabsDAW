<?php 

session_start();
require_once("modelo.php");

if($_POST["borrar"] == "Sí")
{
    deleteJugador($_SESSION["idUpdate"]);
    header("location: index.php");
}
else
{
    header("location: index.php");
}

?> 