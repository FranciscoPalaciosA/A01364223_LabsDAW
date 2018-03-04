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
                $_SESSION["foto"] = "uploads/" . $fila['fotoperfil'];
            }
            //var_dump($foto);
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
                            <th> Nombre </th>
                            <th> Equipo </th>
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
                         <td> <a href="editar.php?id='.$fila["id"].'&modo=editar">Editar</a> </td>
                         <td> <a href="editar.php?id='.$fila["id"].'&modo=borrar">Borrar</a> </td>
                         </tr>';
        }
      
        $string_res .= '</tbody>
                        </table>';
     
        disconnectDb($mysql);
        
        return $string_res;
    }

    return $string_res; 
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

function createJugador($nombreJug, $equipo, $posicion, $yardas)
{
    $mysql = connectDb();
    
     if ($mysql != NULL) {
            
         // insert command specification 
         $query='INSERT INTO Jugadores (nombre, equipo, posicion, yardas) VALUES (?,?,?,?) ';
         // Preparing the statement 
         if (!($statement = $mysql->prepare($query))) {
             die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
         }
         // Binding statement params 
         if (!$statement->bind_param("sssd", $nombreJug, $equipo, $posicion, $yardas)) {
             die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
         }
         // Executing the statement
         if (!$statement->execute()) {
             die("Execution failed: (" . $statement->errno . ") " . $statement->error);
         }  
         
         //mysqli_free_result($results);
         disconnectDb($mysql);
         return true;
        } 
    return false;
}

function updateJugador($nombreJug, $equipo, $posicion, $yardas)
{
    
    $mysql = connectDb();
    
     if ($mysql != NULL) 
     {
             
         $query = 'UPDATE Jugadores SET nombre="'.$nombreJug.'", equipo="'.$equipo.'", posicion="'.$posicion.'", yardas="'.$yardas.'" WHERE id ="'.$_SESSION["idUpdate"].'"';
             // Preparing the statement 
             
         if (!($statement = $mysql->prepare($query))) {
             die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
         }
        // Binding statement params 
        // if (!$statement->bind_param("sssd", $nombreJug, $equipo, $posicion, $yardas)) {
        //     die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        // }
        // Executing the statement
         if (!$statement->execute()) {
             die("Execution failed: (" . $statement->errno . ") " . $statement->error);
         }      
             
             //mysqli_free_result($results);
         disconnectDb($mysql);
         return true;
     } 
    return false;
}

function deleteJugador($id)
{
    $mysql = connectDB();
    
    if($mysql != NULL)
    {
        $query = 'DELETE FROM Jugadores WHERE id = "'.$id.'"';
        
        if (!($statement = $mysql->prepare($query))) {
             die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        
        if (!$statement->execute()) {
             die("Execution failed: (" . $statement->errno . ") " . $statement->error);
         }      

         disconnectDb($mysql);
        
        return true;
    }
    
    return false;
}

?>