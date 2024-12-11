<?php 
include("../conexion/b.php");
$r1 = $_POST['codigo'];
$bd->query("DELETE FROM solicitudes WHERE id_solicitudes ='$r1'");
 ?>