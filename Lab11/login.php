<?php

if($_POST["nombre"] != "" && $_POST["password"] != "" && is_numeric($_POST["tel"]))
{
    include("partials/_header.html");
    
    echo "Bienvenido ".$_POST["nombre"]." ".$_POST["apellido"]."<br>";
    echo "Te recordamos que has ingresado el número telefónico ".$_POST["tel"].".<br> Para cambiarlo, favor de llamar al 722 201 3985";
    
    //echo "<br><br><button type='button'>Regresar al login</button>";
    include("partials/_dentroForm.html"); 
    include("partials/_footer.html"); 
}
else
{
    header("location: index.php");
}

?> 