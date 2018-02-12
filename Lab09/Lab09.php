<!DOCTYPE HTML>

<html lang="es-mx">

<head>

<meta charset="utf-8"/>

<meta name="description" content="Primer Laboratorio de DAW"/>
    
<link rel="stylesheet" type="text/css" href="../Lab01/css_Lab01.css">

<script type = "text/javascript" src = "Lab04_JS.js"></script>


<title> Laboratorio 09 DAW </title>

</head>

<body>
    
    <div id = "wrapper">
     
        <header>
		  <h1>Laboratorio 09 DAW </h1>
	    </header>
    
        <main id = "contenido">
            
            <section>
                
                <h2> PHP </h2>
                
                <h3> Promedio y Mediana </h3>
                <article>
                    
                    <?php  

                    function promedio($arr)
                    {
                        $prom = 0;
                        foreach($arr as $value)
                        {
                            $prom += $value;
                        }

                        $prom = $prom / count($arr);
                        echo $prom;
                    }
                    
                    function array_median($array) 
                    {
                      $iCount = count($array);
                      $middle_index = floor($iCount / 2);
                      sort($array, SORT_NUMERIC);
                      $median = $array[$middle_index]; 

                      if ($iCount % 2 == 0) {
                        $median = ($median + $array[$middle_index - 1]) / 2;
                        }
                    
                        echo $median;
                    }
                    ?>
                    
                    <b>Datos</b> = [10,20,30,40,90,100,100,90,30]
                    || <b>Promedio</b> = 
                    <?php 
                    $arreglo1 = array(10,20,30,40,90,100,100,90,30);
                    promedio($arreglo1);
                    ?>
                    || <b>Mediana</b> = 
                    <?php 
                    array_median($arreglo1);
                    ?>
                    <br>
                    <b>Datos</b> = [30,50,44,21,543,65,10,22,78,43,677]
                    || <b>Promedio</b> = 
                    <?php 
                    $arreglo2 = array(30,50,44,21,543,65,10,22,78,43,677);
                    promedio($arreglo2);
                    ?>
                    || <b>Mediana</b> = 
                    <?php 
                    array_median($arreglo2);
                    ?>
                    <br>             
                    
                </article>
                
                <h3> Lista </h3>
                <article> 
                    <?php 
                    function print_Array($arr)
                    {
                        $result = "[";
                        foreach($arr as $value)
                        {
                            $result = $result . (string)$value . ", ";
                            
                        }
                        echo $result . "]";
                    }
                    ?>
                    
                    <?php
                    $arreglo3 = array(32,45,78,98,12,54,23,5,7,90,12);
                    ?>
                    Datos = <?php print_Array($arreglo3) ?>
                    
                    <br><br>
                    
                    Resultados:
                    <ul>
                        <li> Promedio = <?php promedio($arreglo3) ?></li>
                        <li> Mediana = <?php array_median($arreglo3) ?></li>
                        <li> 
                            Ordenado Menor a Mayor =
                            <?php
                            sort($arreglo3, SORT_NUMERIC); 
                            print_Array($arreglo3); 
                            ?>
                        </li>
                        <li>
                            Ordenado Mayor a Menor = 
                            <?php
                            rsort($arreglo3, SORT_NUMERIC); 
                            print_Array($arreglo3); 
                            ?>
                        </li>
                    </ul>
                    
                    <?php
                    $arreglo3 = array(45,1020,232,12,532,54,1,2,3,45);
                    ?>
                    Datos = <?php print_Array($arreglo3) ?>
                    
                    <br><br>
                    
                    Resultados:
                    <ul>
                        <li> Promedio = <?php promedio($arreglo3) ?></li>
                        <li> Mediana = <?php array_median($arreglo3) ?></li>
                        <li> 
                            Ordenado Menor a Mayor =
                            <?php
                            sort($arreglo3, SORT_NUMERIC); 
                            print_Array($arreglo3); 
                            ?>
                        </li>
                        <li>
                            Ordenado Mayor a Menor = 
                            <?php
                            rsort($arreglo3, SORT_NUMERIC); 
                            print_Array($arreglo3); 
                            ?>
                        </li>
                    </ul>
                </article>
                
                <h3> Tabla </h3>
                
                Ver final de página!
                <p>                    
                    <?php
                    echo " <table border='3' id = 'Tabla' cellspacing='0'>

                    <tr>
                    <td class='hed' colspan='8'>Tabla</td>
                      </tr>
                    <tr>
                    <th>n</th>
                    <th>n^2</th>
                    <th>n^3</th>
                    </tr>";
                    
                    $cuadrado = 0;
                    $cubo = 0;
                    
                    for($i = 1; $i <= 15; $i++){
                        
                        $cuadrado = pow($i,2);
                        $cubo = pow($i,3);
                        
                        echo "<tr>
                        <td>$i</td>
                        <td>$cuadrado</td>
                        <td>$cubo</td>
                        </tr>";
                    }
                    
                    ?>
                    
                </p>
            <h3>
                Problema de mi elección: Mostrar números primos  hasta el 100
            </h3>
                <article>
                    
                    <?php 
                    $aux1 = 0;
                    $aux2 = 0; 
                    $aux3 = 0;
                    $res = 0;
                    $str = "";
                    
                    for($aux1 = 1; $aux1 <= 100; $aux1++)
                    {
                        for($aux2 = 1; $aux2 <= $aux1; $aux2++)
                        {
                            $res = $aux1 % $aux2;
                            
                            if($res == 0)
                            {
                                $aux3 = $aux3 + 1;
                            }
                        }
                        if($aux3 == 2)
                        {
                            $str = $str . (string)$aux1 . ", ";
                        }
                        
                        $aux3 = 0;
                    }
                    
                    echo $str;
                    
                    ?>
                </article>
                
            </section>
            
            <section>
                <h2> Preguntas a responder </h2>
                <article>
                    <h3 id ="1">
                        ¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.
                    </h3>
                    <p>
                        Es una función que despliega en la pantalla toda la configuración de la versión actual de PHP que tenemos instalada.
                        Vienen datos como Build Date, que en mi caso fue el 16 de enero de 2018 a las 14:25:02. Realmente no conozco casi nada de lo que viene en las tablas que despliega phpinfo(); pero creo que me llama la atención la tabla que llama pdo_mysql pues supongo que usaremos algo de eso para el proyecto. Por último me llamó la atencion fue la sección mysqlnd statistics de la tabla mysqlnd, pues todas las filas tienen un "0" en la columna de enabled. 
                    </p>
                    
                    <h3 id ="1">
                        ¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción?
                    </h3>
                    <p>
                        Es necesario preparar la base de datos, el registro del usuario, el gestor de despliegue así como el servidor Web reomot. 
                    </p>
                    
                    <h3 id ="1">
                        ¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? Explica.
                    </h3>
                    <p>
                        Lo que se ejecuta es el archivo php, el cual incluye el HTML, o sea que el HTML no está ligado con el php. 
                    </p>
                    
                </article>
            </section>
            
            <section>
                <h2>Referencias</h2>
                <strong> <a href="#1">[1]</a> </strong>
                phpnet. "PHP Include" Internet:
                <a href="http://php.net/manual/es/function.include.php">
                    http://php.net/manual/es/function.include.php
				</a>
				,[Febrero 9, 2018]. <br>
                
            </section>
            
        </main>        
    </div>

</body>

</html>