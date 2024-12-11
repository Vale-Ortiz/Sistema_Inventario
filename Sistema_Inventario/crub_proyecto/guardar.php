
<?php 
include("../conexion/b.php");
$r1 = $_POST['nombre'];
$r2 = $_POST['descripcion']; 
$r3 = $_POST['fecha_inicio']; 
$r4 = $_POST['fecha_fin']; 
$r5 = $_POST['presupuesto']; 
$bd->query("INSERT INTO proyectos VALUES (NULL,'$r1','$r2','$r3','$r4','$r5')");
?>