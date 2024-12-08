<?php 
include("../conexion/b.php");
$r1 = $_POST['proyec'];
$r2 = $_POST['descris']; 
$r3 = $_POST['usua']; 
$bd->query("INSERT INTO solicitudes VALUES (NULL,'$r1','$r2','$r3',CURRENT_TIMESTAMP)");
?>