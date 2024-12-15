<?php 
include("../conexion/b.php");

$r1 = $_POST['codigo'];
$r2 = $_POST['nombre'];
$r3 = $_POST['descri']; 
$r4 = $_POST['Stock']; 
$r5 = $_POST['precio']; 
$r6 = $_POST['prov'];

$bd->query("UPDATE materiales SET nombre ='$r2', descripcion ='$r3', stock ='$r4', precio ='$r5', 
proveedor_id ='$r6' WHERE material_id = '$r1'");
?>
