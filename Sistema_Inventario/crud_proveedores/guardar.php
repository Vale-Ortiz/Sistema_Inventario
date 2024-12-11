<?php 
include("../conexion/b.php");
$r1 = $_POST['nit'];
$r2 = $_POST['nombre']; 
$r3 = $_POST['direccion']; 
$r4 = $_POST['telefono']; 
$r5 = $_POST['correo']; 
 
$bd->query("INSERT INTO proveedores VALUES (NULL,'$r1','$r2','$r3','$r4','$r5')");
?>
