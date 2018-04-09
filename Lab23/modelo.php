<?php

    //CONEXION
    function connectDb()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zombies";
        
        $sql = mysqli_connect($servername, $username, $password, $dbname);
        $sql->set_charset("utf8");
        
        if (!$sql){
            die("Conexion fallida: " . mysqli_connect_error());
        }
        
        return $sql;
    }

    function disconnectDb($sql)
    {
        mysqli_close($sql);
    }
    
      //GETTERS
    function getZombies()
    {
        $mysql = connectDb(); 
    
        if($mysql != NULL)
        {
            $sql = "SELECT * FROM Zombies";
        
            $result = mysqli_query($mysql, $sql);
           
            $string_res = "";
            $string_res = "<table>
                            <thead>
                            <tr>
                                <th> Nombre del Zombie </th>
                                <th> Estado </th>
                            </tr>
                            </thead>
                            <tbody>";
        
            while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
            {
                $string_res .= '<tr>
                             <td> '.$fila["nombre"].' </td>
                             <td> '.$fila["estado"].' </td>
                             <td> <a href="editar.php?id='.$fila["id_Zombie"].'">Editar</a> </td>
                             </tr>';
            }
          
            $string_res .= '</tbody>
                            </table>';
         
            disconnectDb($mysql);
            
            return $string_res;
        }
    
        return $string_res; 
    }
    
    function getZombieModificar($id, $info)
    {
        $mysql = connectDb(); 
    
        if($mysql != NULL)
        {
            $sql = "SELECT * FROM Zombies WHERE id_Zombie='".$id."'";
        
            $result = mysqli_query($mysql, $sql);
            
            while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
            {
                $nombre = $fila["nombre"];
                $estado = $fila["estado"];
            }
            
            if($info == "nombre")
            {
                return $nombre;
            }
            else if ($info == "estado")
            {
                return $estado;
            }
            else 
            {
                return ""; 
            }
            
        }
    }
    
    //Primarias
    function registrarZombie($nombre, $estado)
    {
        $mysql = connectDb();
        
        $fechaEstado = date('Y-m-d H:i:s');
        
        if ($mysql != NULL) 
        {
            $query='INSERT INTO Zombies (nombre, estado, fechaUltimoEstado) VALUES (?,?,?)';
        
            if (!($statement = $mysql->prepare($query))) {
                 die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
             }
             // Binding statement params 
             if (!$statement->bind_param("sss", $nombre, $estado, $fechaEstado)) {
                 die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
             }
             // Executing the statement
             if (!$statement->execute()) {
                 die("Execution failed: (" . $statement->errno . ") " . $statement->error);
             }  

             disconnectDb($mysql);
             
             return true;
        } 
        
    return false;
    
    }
    
    function updateZombie($estado)
    {
        
        $mysql = connectDb();
        
         if ($mysql != NULL) 
         {
            $fechaEstado = date('Y-m-d H:i:s');     
            
            $query = 'UPDATE Zombies SET estado="'.$estado.'", fechaUltimoEstado="'.$fechaEstado.'" WHERE id_Zombie="'.$id_Zombie.'"';
                 // Preparing the statement 
                 
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
    
    function cambiarEstado($id, $estado)
    {
        $mysql = connectDb();
        
        $fechaEstado = date('Y-m-d H:i:s');
        
        if ($mysql != NULL) 
        {
            $query = 'UPDATE Zombies SET estado="'.$estado.'", fechaUltimoEstado="'.$fechaEstado.'" WHERE id_Zombie ="'.$id.'"';
        
            if (!($statement = $mysql->prepare($query))) {
                 die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
             }
             
             // Executing the statement
             if (!$statement->execute()) {
                 die("Execution failed: (" . $statement->errno . ") " . $statement->error);
             }  

             disconnectDb($mysql);
             
             return true;
        } 
        
    return false;
    
    }
    
    //CONSULTAS
    function getCantidades()
    {
        $mysql = connectDb(); 
    
        if($mysql != NULL)
        {
            //PRIMERA
            $sql = "SELECT count(id_Zombie) as 'Total de Zombies' FROM Zombies";
        
            $result = mysqli_query($mysql, $sql);
           
            $string_res = "";
            $string_res = "<h3>Total de Zombies</h3>
                            <table>
                            <thead>
                            <tr>
                                <th> Total </th>
                            </tr>
                            </thead>
                            <tbody>";
        
            while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
            {
                $string_res .= '<tr>
                             <td> '.$fila["Total de Zombies"].' </td>
                             </tr>';
            }
          
            $string_res .= '</tbody>
                            </table>';
            
            //SEGUNDA
            $sql = "SELECT estado, count(id_Zombie) as 'NoZombies'
                        FROM Zombies
                        GROUP BY estado";
        
            $result = mysqli_query($mysql, $sql);
           
            $string_res .= "<h3>Número de Zombies por Estado</h3>
                            <table>
                            <thead>
                            <tr>
                                <th> Estados </th>
                                <th> No. de Zombies </th>
                            </tr>
                            </thead>
                            <tbody>";
        
            while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
            {
                $string_res .= '<tr>
                             <td> '.$fila["estado"].' </td>
                             <td> '.$fila["NoZombies"].' </td>
                             </tr>';
            }
          
            $string_res .= '</tbody>
                            </table>';
                            
            
            //TERCERA
            $sql = "SELECT estado, count(id_Zombie) as 'NoZombiesNoMuertos'
                        FROM Zombies
                        WHERE estado != 'Completamente Muerto'";
        
            $result = mysqli_query($mysql, $sql);
           
            $string_res .= "<h3>Numero de Zombies no Completamente Muertos</h3>
                            <table>
                            <thead>
                            <tr>
                                <th> No. de Zombies no Completamente Muertos </th>
                            </tr>
                            </thead>
                            <tbody>";
        
            while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
            {
                $string_res .= '<tr>
                             <td> '.$fila["NoZombiesNoMuertos"].' </td>
                             </tr>';
            }
          
            $string_res .= '</tbody>
                            </table>';
         
         
            disconnectDb($mysql);
            
            return $string_res;
        }
    
        return $string_res; 
        
    }
    
    function getZombiesRegistrados()
    {
        $mysql = connectDb(); 
    
        if($mysql != NULL)
        {
            $sql = "SELECT * FROM Zombies ORDER BY fechaCreacion DESC";
        
            $result = mysqli_query($mysql, $sql);
           
            $string_res = "";
            $string_res = "<h3>Zombies registrados por fecha de creación</h3>
                            <table>
                            <thead>
                            <tr>
                                <th> Nombre del Zombie </th>
                                <th> Estado </th>
                                <th> Fecha de registro </th>
                            </tr>
                            </thead>
                            <tbody>";
        
            while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
            {
                $string_res .= '<tr>
                             <td> '.$fila["nombre"].' </td>
                             <td> '.$fila["estado"].' </td>
                             <td> '.$fila["fechaCreacion"].' </td>
                             </tr>';
            }
          
            $string_res .= '</tbody>
                            </table>';
         
            disconnectDb($mysql);
            
            return $string_res;
        }
    
        return $string_res; 
    }
    
    function getZombiesPorEstado($estadoElegido)
    {
        $mysql = connectDb(); 
    
        if($mysql != NULL)
        {
            $sql = "SELECT * FROM Zombies WHERE estado='".$estadoElegido."' ORDER BY fechaCreacion DESC";
        
            $result = mysqli_query($mysql, $sql);
           
            $string_res = "";
            $string_res = "<h3>Zombies registrados con estado ".$estadoElegido."</h3>
                            <table>
                            <thead>
                            <tr>
                                <th> Nombre del Zombie </th>
                                <th> Estado </th>
                                <th> Fecha de registro </th>
                            </tr>
                            </thead>
                            <tbody>";
            $i = 0;
            while($fila = mysqli_fetch_array($result, MYSQLI_BOTH))
            {
                $string_res .= '<tr>
                             <td> '.$fila["nombre"].' </td>
                             <td> '.$fila["estado"].' </td>
                             <td> '.$fila["fechaCreacion"].' </td>
                             </tr>';
                $i++;
            }
          
            $string_res .= '</tbody>
                            </table>
                            Total = '.$i;
         
            disconnectDb($mysql);
            
            return $string_res;
        }
    
        return $string_res; 
    }
    
    
    var_dump(getCantidades());
?>