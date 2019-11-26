<!DOCTYPE html> 
<html> 
    
<head> 
<meta charset="UTF-8"> 
<title>Crear Nuevo Usuario</title> 
<style type="text/css" rel="stylesheet"> 
.error{ 
    color: red; 
} 

</style> 
</head> 
<body> 
    
<?php 
//incluir conexión a la base de datos 

include '../../config/conexionBD.php'; 

$fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null; 
$hora = isset($_POST["hora"]) ? mb_strtoupper(trim($_POST["hora"]), 'UTF-8') : null; 
$lugar = isset($_POST["lugar"]) ? mb_strtoupper(trim($_POST["lugar"]), 'UTF-8') : null; 
$coordenadas = isset($_POST["coordenadas"]) ? mb_strtoupper(trim($_POST["coordenadas"]), 'UTF-8') : null; 
$remitente = isset($_POST["remitente"]) ? mb_strtoupper(trim($_POST["remitente"]), 'UTF-8') : null; 
$invitados = isset($_POST["invitados"]) ? mb_strtoupper(trim($_POST["invitados"]), 'UTF-8') : null; 
$motivo = isset($_POST["motivo"]) ? mb_strtoupper(trim($_POST["motivo"]), 'UTF-8') : null; 
$observaciones = isset($_POST["observaciones"]) ? mb_strtoupper(trim($_POST["observaciones"]), 'UTF-8') : null; 


$sql = "INSERT INTO reunion VALUES (0, '$fecha', '$hora', '$lugar', '$coordenadas','$remitente', '$invitados', 
'$motivo', '$observaciones', 'N', null, null)"; 

if ($conn->query($sql) === TRUE) { 
    echo "<p>Se ha creado los datos personales correctamemte!!!</p>"; 
} else { 
    if($conn->errno == 1062){ 
        echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>"; 
}else{
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; 
    } 
} 

//cerrar la base de datos 

$conn->close(); 
echo "<a href='../vista/crearReunion.html'>Regresar</a>"; 
?> 

</body> 
</html> 