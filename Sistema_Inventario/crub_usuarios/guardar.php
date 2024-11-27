<?php 
include("../conexion/b.php");
$r1 = $_POST['nombre'];
$r2 = $_POST['correo']; 
$r3 = $_POST['contraseña']; 
// Encriptar la contraseña usando password_hash()
$contraseña_hash = password_hash($r3, PASSWORD_DEFAULT);
$r4 = $_POST['rol']; 
$bd->query("INSERT INTO usuarios VALUES (NULL,'$r1','$r2','$contraseña_hash','$r4')");
?>
