<?php

session_start();
require_once("modelo.php");

if($_SESSION["textoBoton"] == "Agregar")
{
    createJugador($_POST["nombreJug"], $_POST["equipo"], $_POST["posicion"], $_POST["yardas"]);
    header("location: index.php");
}
else if ($_SESSION["textoBoton"] == "Guardar Cambios")
{
    updateJugador($_POST["nombreJug"], $_POST["equipo"], $_POST["posicion"], $_POST["yardas"]);
    header("location: index.php");    
    echo $_SESSION["idUpdate"];
    
}
else
{
    echo "else";
}
?>  