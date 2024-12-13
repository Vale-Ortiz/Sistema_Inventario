<?php
    session_start(); 
      include("../conexion/b.php");  
       
      $usuarios = $bd->query('SELECT * FROM usuarios ORDER BY usuario_id  desc' )->fetchAll(PDO::FETCH_OBJ);

     $r1 = $_POST['r1'];
     $r2 = $_POST['r2'];
     $r3 = $_POST['r3'];
     $r4 = $_POST['r4'];
     $r5 = $_POST['r5'];
?>
<div> <br><br> 
            <br>
            <br>
        
            <h2>Actualizar datos del Usuario</h2>  
<div class="header-content">       
    </div>
        <!-- Formulario para actualizar usuarios-->
        <section class="form-section">
            <h2>Actualizar</h2>
            <form id="formularios" class="form-grid">
                <div class="left-side">

                <label for="id">ID</label>
                <input type="text" id="codigo" name="codigo" value="<?php echo $r1 ?>" required>

                    <label for="nombre">Nombre </label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $r2 ?>" required>

                    <label for="correo">Correo </label>
                    <input type="text" id="correo" name="correo" value="<?php echo $r3 ?>" required>
                </div>
                <div class="right-side">
                <div class="input-group">
                <label for="contraseña">Contraseña</label>
                <input type="text" id="contraseña" name="contraseña" value="<?php echo str_repeat('.', 5); ?>">

                    <label for="nombre"></label>
                        <select id="rol" name="rol" required>
                            <option value="">Seleccione un rol</option>
                            <option value="gestor">Gestor</option>
                            <option value="ingeniero">Ingeniero</option>
                        </select>
                        </div>
                    <button id="actualizarusuario" class="btn1" type="submit">Actualizar usuario</button> 
                </div>           
            </form>
        </section>
</div>   