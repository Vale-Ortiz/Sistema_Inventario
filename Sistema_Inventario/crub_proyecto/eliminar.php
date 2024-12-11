<?php 
include("../conexion/b.php");
$r1 = $_POST['codigo'];
$bd->query("DELETE FROM proyectos WHERE proyecto_id='$r1'");
 ?>