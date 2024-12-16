
<?php 
include("../../conexion/b.php");

//Pagina admin

    //creamos la sesion 
    session_start(); 
    //validamos si se ha hecho o no el inicio de sesion correctamente 
    //si no se ha hecho la sesion nos regresará a login.php 
    if(!isset($_SESSION['usuario_id']))  
    {          
        header('Location:../../login/loginn.php');           
        exit(); 
    } 
    $contador = $bd->query('SELECT COUNT(*) as total_registros  FROM solicitudes' )->fetch(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raing Proyectos S.A.S</title>
    <link rel="stylesheet" type="text/css" href="../../media/css/jquery.modal.css">
    <link rel="stylesheet" href="../../media/css/style_hf.css">
    <link href="../../media/css/select2.min.css" rel="stylesheet"/>

</head>
<body>
<!-- Botón para solicitudes de materiales, con un lugar para el número -->
<button id="solicitudes-materiales" class="fixed-button">
    Solicitudes de Materiales (<span id="cantidad-solicitudes"><?php echo $contador->total_registros; ?></span>)
</button>
 <!-- Header -->
 <div id="header-container"></div> 

     <br>
         <!-- Aquí se cargará dinámicamente el contenido -->
        <div id="contenido">
      
        </div>  
  
 <div id="footer-pie"></div>
 <script src="../../media/js/jquery.js"></script>
 <script src="../../media/js/select2.min.js"></script>
 <script src="../../media/js/jquery.modal.min.js"></script> 
 <script src="../../media/js/crud.js"></script>
 
</body>
</html>