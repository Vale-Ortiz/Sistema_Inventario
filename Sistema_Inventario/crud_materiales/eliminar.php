<?php 
include("../conexion/b.php");
$r1 = $_POST['codigo'];
$bd->query("DELETE FROM materiales WHERE material_id ='$r1'");
 ?>