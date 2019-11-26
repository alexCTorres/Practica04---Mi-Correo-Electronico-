<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Gestión de usuarios</title> 
    </head> 
<body> 

<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
    ("Location: /Practica04 - Mi Correo Electronico/public/vista/login.html"); 
    } 
    ?>
    
<table style="width:100%"> 
<tr> 
    <th>Cedula</th> 
    <th>Nombres</th> 
    <th>Apellidos</th> 
    <th>Rol</th> 
    <th>Dirección</th> 
    <th>Telefono</th> 
    <th>Correo</th> 
    <th>Fecha Nacimiento</th> 
</tr>

<?php 

include '../../../config/conexionBD.php'; 
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null; 

$sql = "SELECT * FROM usuario  WHERE usu_rol='user' ";

$result = $conn->query($sql); 

   if ($result->num_rows > 0) { 
    
        while($row = $result->fetch_assoc()) { 
    
            echo "<tr>"; 
            echo " <td>" . $row["usu_cedula"] . "</td>";
            echo " <td>" . $row['usu_nombres'] ."</td>"; 
            echo " <td>" . $row['usu_apellidos'] . "</td>"; 
            echo " <td>" . $row['usu_rol'] . "</td>";
            echo " <td>" . $row['usu_direccion'] . "</td>"; 
            echo " <td>" . $row['usu_telefono'] . "</td>"; 
            echo " <td>" . $row['usu_correo'] . "</td>"; 
            echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>"; 
            echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>"; 
            echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>"; 
            echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";
            echo "</tr>";
        } 

} else {
    echo "<tr>"; 
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
    echo "</tr>"; 

}
    $conn->close(); 
    
    ?> 

    </table>
<!--<center>
    <input type="submit" id="listar" name="listar" href= "listarReuniones.php" value="Listar Reuniones"/> 
<input type="submit" id="crear" name="crear" value="Crear Reuniones" /> </center>-->

<?php
  echo " <td> <a href='../.php?codigo='>Listar Reuniones</a> </td>";
  echo " <td> <a href='../../../public/vista/crearReunion.html?codigo='>Crear una Reunion</a> </td>";
  echo " <td> <a href='../../../public/vista/crearReunion.html?codigo='>Buscar una Reunion</a> </td>";

?>
</body> 
</html>