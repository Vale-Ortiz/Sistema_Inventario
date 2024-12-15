<?php      
 session_start(); 
 if (isset($_SESSION['rol']) && isset($_SESSION['nombre'])) {
    // La sesión está activa
    $rol = $_SESSION['rol'];
    $nombre = $_SESSION['nombre'];
   } else {
       // No hay sesión activa
       echo "No has iniciado sesión. <a href='login.php'>Iniciar sesión</a>";
   }
?>
<header>
    <div class="header-content">
        <img src="../../media/image/Logo.png" alt="Logo de la Empresa" class="logo">
        <ul class="nav-links"></ulclass><li><a href="#" id=perfil"><?php echo $rol; ?> <?php echo $nombre; ?></a></li></ul>
        <nav>
            <ul class="nav-links">
                <li><a href="#" id="verproyectos">Proyectos</a></li>                                             
                <li><a href="#" id="Solicitudes">Solicitudes</a></li>                                             
                <li><a href="#" id="desconectar">Cerrar Sesión</a></li>
            </ul>
            
        </nav>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div> <!-- Botón de menú -->
    </div>
</header>
