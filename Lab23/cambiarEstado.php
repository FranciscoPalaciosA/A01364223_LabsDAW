<?php

session_start();
require_once("modelo.php");

    cambiarEstado($_SESSION["id"],$_POST["estadoNuevo"]);
    
    echo '<script type="text/javascript">
        alert("Estado de Zombie cambiado exitosamente");
        location="index.php";
        </script>';
?>