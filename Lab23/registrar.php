<?php

session_start();
require_once("modelo.php");

    registrarZombie($_POST["nombre"],$_POST["estado"]);
    
    echo '<script type="text/javascript">
        alert("Zombie registrado exitosamente");
        location="index.php";
        </script>';
?>