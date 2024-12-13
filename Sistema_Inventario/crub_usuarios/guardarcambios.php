<?php 
include("../conexion/b.php");

$r1 = $_POST['codigo'];
$r2 = $_POST['nombre'];
$r3 = $_POST['correo']; 
$r4 = $_POST['contraseña'];
$contraseña_hash = password_hash($r4, PASSWORD_DEFAULT);
$r5 = $_POST['rol']; 

$bd->query("UPDATE usuarios SET nombre = '$r2', correo ='$r3', 
contraseña = '$r4', rol ='$r5' WHERE usuario_id = '$r6'");
?>

