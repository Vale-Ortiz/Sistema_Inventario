<?php 
session_start();
	$cod= $_GET['codigo'];
	$found=false;
	foreach ($_SESSION['Materialesa'] as $material=>$x) {
		 if($x->material_id == $cod) {
		 	$found=true;
		 	break;
            }
	}
	if ($found) {
		  unset($_SESSION['Materialesa'][$material]);
	}
 ?>