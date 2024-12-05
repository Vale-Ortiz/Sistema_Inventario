<?php 

$p1="";
$p2="";

if(isset($_POST["operacion"])&&$_POST["operacion"]=="agregar2")
{
  $codigomaterial = $_POST['numser_codigo'];  
  $cantidadmaterial = $_POST['cantidad'];  
  
   
  if ($bd->query("SELECT * from materiales WHERE material_id ='$codigomaterial' AND stock>='$cantidadmaterial'" )->fetch(PDO::FETCH_OBJ)) {  
    $Material = $bd->query("SELECT * from materiales WHERE material_id = $codigomaterial" )->fetch(PDO::FETCH_OBJ);
  $Material->cantidadmaterial = $cantidadmaterial;  
  $_SESSION['Materialesa'][] = $Material;
  }else{  
    echo "<script>
                             alert('No tenemos esa cantidad del Materiales')           
          </script>";
  }
}


if(isset($_POST["operacion"])&&$_POST["operacion"]=="cancelarotoramientos")
{
   $_SESSION['Materialesa']=null;
   $_SESSION['pro'] = null;  
}

if(isset($_POST["operacion"])&&$_POST["operacion"]=="Seleccionarproyecto")
{  
  $r1 = $_POST['proyecto'];

  if ($pro=$bd->query("SELECT * from proyectos WHERE proyecto_id = '$r1'")->fetch(PDO::FETCH_OBJ)) {  
      $pro=$bd->query("SELECT * from proyectos WHERE proyecto_id = '$r1'")->fetch(PDO::FETCH_OBJ);     
      $_SESSION['pro'] = $pro;  
  }
}

if(isset($_POST["operacion"])&&$_POST["operacion"]=="guardarotorgamientos")
{ 


 $rolusuario =$_POST['usua'];
 $p=$_SESSION['pro']->proyecto_id;

 


  $bd->query("INSERT INTO otorgamientos(proyecto_id,fecha,usuario_id ) VALUES('$p',CURRENT_TIMESTAMP,'$rolusuario')");
  $ultima = $bd->lastInsertId();
  
    foreach ( $_SESSION['Materialesa'] as $u)
    {
      $bd->query("INSERT INTO detalle_otorgamientos VALUES(null,'$ultima','$u->material_id',CURRENT_TIMESTAMP)");
         echo "<script>
                             alert('Otorgamiento de Materiales Realizado con Exito')           
          </script>";
    }
  
    $_SESSION['Materialesa']=null;
   $_SESSION['pro'] = null;  
   
  
}

if(isset($_SESSION['pro']))
{
  $p1 = $_SESSION['pro']->proyecto_id;
  $p2 = $_SESSION['pro']->nombre;
 
}




/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
*/

if(isset($_SESSION['Materialesa']))
{
  $list=$_SESSION['Materialesa'];
}else{ 
  $list=array();
}



?>

