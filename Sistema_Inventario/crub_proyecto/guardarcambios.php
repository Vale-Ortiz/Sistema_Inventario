<?php 
include("../conexion/b.php");

$r1 = $_POST['nombre'];
$r2 = $_POST['descripcion']; 
$r3 = $_POST['fecha_inicio']; 
$r4 = $_POST['fecha_fin']; 
$r5 = $_POST['presupuesto']; 
$r6 = $_POST['codigo'];

$bd->query("UPDATE proyectos SET nombre = '$r1', descripcion ='$r2', 
fecha_inicio='$r3', fecha_fin='$r4', presupuesto ='$r5' WHERE proyecto_id = '$r6'");
?>