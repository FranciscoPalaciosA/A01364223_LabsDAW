<?php
    session_start();
    require_once("modelo.php");
    
    if(isset($_SESSION["nombre"]) ) 
    {
        
        include("partials/_header.html");
        
        $nombre = $_SESSION["nombre"];
        $apellido = $_SESSION["apellido"];
        $tel = $_SESSION["tel"];
        
        include("partials/_dentroForm.html");
        include("partials/_footer.html"); 
        
    }
    else if (login($_POST["nombre"], $_POST["password"])) 
    {
        
        unset($_SESSION["error"]);
        
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["apellido"] = $_POST["apellido"];
        $_SESSION["tel"] = $_POST["tel"];
        
        $nombre = $_SESSION["nombre"];
        $apellido = $_SESSION["apellido"];
        $tel = $_SESSION["tel"];
        
        include("partials/_header.html");
        include("partials/_dentroForm.html");
        include("partials/_footer.html"); 
        
    }
    else 
    {
        $_SESSION["error"] = "Usuario y/o contraseña incorrectos";
        header("location: index.php");
    }
    
?>