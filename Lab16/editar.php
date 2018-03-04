<?php

session_start(); 

$_SESSION["idUpdate"] = $_GET["id"];

if ($_GET["modo"] == "editar")
{
    $_SESSION["textoBoton"] = "Guardar Cambios";
    include("partials/_header.html");
    include("partials/_agregar.html");
    include("partials/_footer.html"); 
}
else if ($_GET["modo"] == "borrar")
{
    include("partials/_header.html");
    include("partials/_borrar.html");
    include("partials/_footer.html");    
}
else
{
    include("partials/_header.html");
    include("partials/_form.html");
    include("partials/_footer.html");    
}


?>