<!DOCTYPE html> 

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Modificar datos de persona</title> 
        <link href=  "../../../css/styles.css"rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../../javaScript/validaciones.js"> </script>
    </head> 
    
<body> 
    
<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
    ("Location: /Practica04 - Mi Correo Electronico/public/vista/login.html"); 
    } 
    ?>

<?php 

$codigo = $_GET["codigo"]; 
$sql = "SELECT * FROM usuario where usu_codigo=$codigo"; 

include '../../../config/conexionBD.php'; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) { 
        
        ?> 

        <h1>MODIFICAR USUARIO</h1>
        
        <form id="formulario01" method="POST" action="../../controladores/usuario/modificar.php">
        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
        
        <label for="cedula">Cedula (*)</label> 
        <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" placeholder="Ingrese el número de cedula ..."  onchange="validarCedula()" onkeypress="return validarNumeros(event)" maxlength="10">
        <br> 
        
        <label for="nombres">Nombres (*)</label> 
        <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" placeholder="Ingrese minimo un nombre ..."  onkeypress=" return validarLetras(event)" onchange="validarNombre()" /> 
        <br> 
        
        <label for="apellidos">Apelidos (*)</label> 
        <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" placeholder="Ingrese minimo un apellido..." onkeypress=" return validarLetras(event)" onchange="validarApellido()">
        <br> 

        <label for="rol">Rol (*)</label> 
        <input type="text" id="rol" name="rol" value="<?php echo $row["usu_rol"]; ?>" required placeholder="Ingrese user/admin ..."/> 
        <br> 
        
        <label for="direccion">Dirección (*)</label> 
        <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" placeholder="Ingrese su dirección ..."  onkeypress=" return validarLetrasNumeros(event)" onchange="validarDireccion()">
        <br> 
        
        <label for="telefono">Teléfono (*)</label> 
        <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" placeholder="Ingrese su número telefónico ..."   onkeypress="return validarNumeros(event)" onchange="validarTelefono()" maxlength="10">
        <br> 
        
        <label for="fecha">Fecha Nacimiento (*)</label> 
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" placeholder="Ingrese una fecha con formato dd/mm/yyyy..." onkeypress="return validarFechaNumeros(event)" onchange="validarFecha()" maxlength="10">
        <br> 
        
        <label for="correo">Correo electrónico (*)</label> 
        <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" placeholder= "usuario@ups.edu.ec/est.ups.edu.ec..." onkeypress="return validarLetrasCorreo(event)" onchange="validarCorreo()">
        <br> 
        
        <input type="submit" id="modificar" name="modificar" value="Modificar" /> 
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
</form> 

<?php 

} 
} else { 
    
    echo "<p>Ha ocurrido un error inesperado !</p>"; 
    echo "<p>" . mysqli_error($conn) . "</p>"; 
    
    } 
    
    $conn->close(); 
    
?> 

</body> 
</html>