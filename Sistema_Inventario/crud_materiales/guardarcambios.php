<?php 
include("../conexion/b.php");
$r1 = $_POST['nombre'];
$r2 = $_POST['descri']; 
$r3 = $_POST['Stock']; 
$r4 = $_POST['Precio']; 
$r5 = $_POST['prov'];
$r6 = $_POST['codigo'];

$bd->query("UPDATE materiales SET nombre = '$r1', descri = '$r2', stock = '$r3', 
precio = '$r4', prov = '$r5' WHERE material_id ='$r6'");
?>
