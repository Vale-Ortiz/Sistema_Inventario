<?php 
include("../conexion/b.php");

    $r1 = $_POST['codigo'];
    $r2 = $_POST['nit'];
    $r3 = $_POST['nombre']; 
    $r4 = $_POST['direccion']; 
    $r5 = $_POST['telefono']; 
    $r6 = $_POST['correo']; 
    
 
$bd->query("UPDATE proveedores SET nit = '$r2', nombre = '$r3', direccion = '$r4', telefono = '$r5', 
email = '$r6' WHERE proveedor_id = '$r1'");
?>
