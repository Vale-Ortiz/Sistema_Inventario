<?php 
include("../conexion/b.php");
$r1 = $_POST['codigo'];
$bd->query("DELETE FROM usuarios WHERE usuario_id='$r1'");
 ?>