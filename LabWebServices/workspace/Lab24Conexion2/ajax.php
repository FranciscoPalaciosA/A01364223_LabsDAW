<?php
    
    if($_GET["opcion"] == "productos")
    {
        $opcion = $_GET["opcion"];
        $url = "https://lab24-franciscopalar.c9users.io/lab24/public/$opcion"; //Route to the REST web service
        $c = curl_init($url);
        $response = curl_exec($c);
        curl_close($c);
    }
    
        if($_GET["opcion"] == "info")
    {
        $opcion = $_GET["opcion"];
        $url = "https://lab24-franciscopalar.c9users.io/lab24/public/$opcion"; //Route to the REST web service
        $c = curl_init($url);
        $response = curl_exec($c);
        curl_close($c);
    }
    
?>