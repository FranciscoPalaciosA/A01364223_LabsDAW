<?php

function connectDb()
{
    $mysql = mysqli_connect("localhost","root","","Lab19");
    //root si estan en windows
    $mysql->set_charset("utf8");
    
    if(!$mysql)
    {
        die("Connection failed: ". mysqli_connect_error());
    }
    
    return $mysql;
}

function disconnectDb($mysql) 
{
     mysqli_close($mysql);
}

function getPaises($getID)
{
    $mysql = connectDb(); 

    if($mysql != NULL)
    {
        $sql = "SELECT nombre, id_Pais FROM Paises";

        $result = mysqli_query($mysql, $sql);

        $i = 0;

        while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $words[$i] = $fila["nombre"];
            $ids[$i] = $fila["id_Pais"];
            
            $i++;
        }

        disconnectDb($mysql);
    }
    
    if($getID == 0)
    {
        return $words;
    }
    else
    {
        return $ids;
    }
}

function getCiudades()
{
    $id = $_GET["id"];
    
    $mysql = connectDb(); 

    if($mysql != NULL)
    {
        $sql = "SELECT nombre FROM Ciudades WHERE id_Pais = '".$id."'";

        $result = mysqli_query($mysql, $sql);

        $i = 0;
        
        $string_res = "";
        $string_res = "<table>
                        <thead>
                        <tr>
                            <th> Nombre </th>
                        </tr>
                        </thead>
                        <tbody>";
        
        while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $words[$i] = $fila["nombre"];
            $i++;
            $string_res .= '<tr>
                            <td>'.$fila["nombre"].'</td>
                            </tr>';
            
        }
        
        $string_res .= '</tbody>
                        </table>';
        
        disconnectDb($mysql);
    }

    return $string_res;
}

if($_GET['ciudades'] == 0)
{
    $ciudades = getCiudades();
    
    echo $ciudades;
}
else
{
    $pattern=strtolower($_GET['pattern']);
    
    $response="";
    $size=0;

    $words = getPaises(0); 
    $ids = getPaises(1); 

    for($i=0; $i<count($words); $i++)
    {
       $pos=stripos(strtolower($words[$i]),$pattern);
       if(!($pos===false))
       {
         $size++;
         $word=$words[$i];
         $id = $ids[$i];   
         $response.="<option value=\"$id\">$word</option>";
       }
    }

    if($size>0)
      echo "<select id=\"list\" size=$size onclick=\"selectValue()\">$response</select>";
}

?>
