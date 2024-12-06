<?php 
include("../conexion/b.php");
$r1 = $_POST['nombre'];
$r2 = $_POST['descri']; 
$r3 = $_POST['Stock']; 
$r4 = $_POST['Precio']; 
$r5 = $_POST['prov']; 
$bd->query("INSERT INTO materiales VALUES (NULL,'$r1','$r2','$r3','$r4','$r5')");
?>