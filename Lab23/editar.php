<?php
session_start();
require_once("modelo.php");


$_SESSION["id"] = $_GET["id"];

    include("partials/_header.html");
    include("partials/_editar.html");
    include("partials/_footer.html");
?>