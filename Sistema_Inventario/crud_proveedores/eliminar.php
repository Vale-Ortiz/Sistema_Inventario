<?php 
include("../conexion/b.php");
$r1 = $_POST['codigo'];
$bd->query("DELETE FROM proveedores WHERE proveedor_id='$r1'");
 ?>