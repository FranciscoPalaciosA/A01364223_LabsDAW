<?php

function connectDb()
{
    $mysql = mysqli_connect("localhost","root","","Lab14");
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

function login($user, $password)
{
    $db = connectDb();
    
    if ($db != NULL)
    {
        //Specification of the SQL query
        $query = 'SELECT nombre, fotoperfil FROM Usuarios WHERE nombre="'.$user.
            '" AND password="'.$password.'"';
        //$query;
        // Query execution; returns identifier of the result group
        $results = $db->query($query);
        // cycle to explode every line of the results
             
        if (mysqli_num_rows($results) > 0)
        {
            // it releases the associated results
            while($fila = mysqli_fetch_array($results, MYSQLI_BOTH))
            {
                $foto = $fila['fotoperfil'];
            }
            var_dump($foto);
            mysqli_free_result($results);
            disconnectDb($db);
            
            return true;
        }
        return false;
    } 
    return false;
}

function getPlayers()
{
    $mysql = connectDb(); 
    
    if($mysql != NULL)
    {
        $sql = "SELECT * FROM Jugadores";
    
        $result = mysqli_query($mysql, $sql);
       
        //$results = $db->query($query);
        $string_res = "";
        $string_res = "<table>
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th> Equipo</th>
                            <th> Posición </th>
                            <th> Yardas Totales </th>
                        </tr>
                        </thead>
                        <tbody>";
    
        while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $string_res .= '<tr>
                         <td> '.$fila["nombre"].' </td>
                         <td> '.$fila["equipo"].' </td>
                         <td> '.$fila["posicion"].' </td>
                         <td> '.$fila["yardas"].' </td>
                         </tr>';
        }
      
        $string_res .= '</tbody>
                        </table>';
     
        disconnectDb($mysql);
    
        echo $string_res;
        
        return true;
    }

    return true; 
}

function getHighYardPlayers($yards)
{
    $mysql = connectDb(); 
    
    if($mysql != NULL)
    {
        $sql = 'SELECT * FROM Jugadores WHERE yardas >= "'.$yards.'"';
    
        $result = mysqli_query($mysql, $sql);
    
        $string_res = "";
        $string_res = "<table>
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th> Equipo</th>
                            <th> Posición </th>
                            <th> Yardas Totales </th>
                        </tr>
                        </thead>
                        <tbody>";
    
        while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
        {
            $string_res .= '<tr>
                         <td> '.$fila["nombre"].' </td>
                         <td> '.$fila["equipo"].' </td>
                         <td> '.$fila["posicion"].' </td>
                         <td> '.$fila["yardas"].' </td>
                         </tr>';
        }
      
        $string_res .= '</tbody>
                        </table>';
     
        disconnectDb($mysql);
    
        return $string_res;
    }
    
    return "";
}

?>