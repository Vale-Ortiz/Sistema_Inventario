<?php
session_start(); 
include("../conexion/b.php");

$r1 = $_POST['r1'] ?? ''; // ID usuario
$r2 = $_POST['r2'] ?? ''; // Nombre
$r3 = $_POST['r3'] ?? ''; // Correo
$r4 = '';                 // Contraseña (no se pasa por seguridad)
$r5 = $_POST['r5'] ?? ''; // Rol
?>

<div> <br><br> 
            <br>
            <br>
        
            <h2>Actualizar datos del Proyecto</h2>  
<div class="header-content">  
    </div>
        <!-- Formulario para Actualizar usuarios -->
    <section class="form-section">
    <h2>Actualizar</h2>
        <form id="formularios" class="form-grid">
            <div class="left-side">
                <label for="id">ID</label>
                <input type="text" id="codigo" name="codigo" value="<?php echo htmlspecialchars($r1); ?>" readonly>

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($r2); ?>" required>

                <label for="correo">Correo</label>
                <input type="text" id="correo" name="correo" value="<?php echo htmlspecialchars($r3); ?>" required>
            </div>
            <div class="right-side">
                
                <label for="contraseña">Nueva contraseña</label>
                <input type="text" id="contraseña" name="contraseña" >

                <label for="rol">Rol</label>
                <select id="rol" name="rol" required>
                    <option value="" <?php echo $r5 === '' ? 'selected' : ''; ?>>Seleccione un rol</option>
                    <option value="gestor" <?php echo $r5 === 'gestor' ? 'selected' : ''; ?>>Gestor</option>
                    <option value="ingeniero" <?php echo $r5 === 'ingeniero' ? 'selected' : ''; ?>>Ingeniero</option>
                </select>
                <br>
                <button id="actualizarusuario" class="btn1" type="submit">Actualizar usuario</button>
            </div>
        </form>
    </section>
</div>
