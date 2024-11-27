
<?php 
    //creamos la sesion 
    session_start(); 
    //validamos si se ha hecho o no el inicio de sesion correctamente 
    //si no se ha hecho la sesion nos regresará a login.php 
    if(!isset($_SESSION['usuario_id']))  
    {          
        header('Location:../../login/loginn.php');           
        exit(); 
    } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raing Proyectos S.A.S</title>
    <link rel="stylesheet" href="../../media/css/style_hf.css">
</head>
<body>
    
 <!-- Header -->
 <div id="header-container"></div> 

     <br>
         <!-- Aquí se cargará dinámicamente el contenido -->
        <div id="contenido">
      
        </div>  
  
 <div id="footer-pie"></div>
 <script src="../../media/js/jquery.js"></script>
 <script src="../../media/js/crud.js"></script>
 
</body>
</html>