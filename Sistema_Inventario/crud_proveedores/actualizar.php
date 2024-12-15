<?php
    session_start(); 
      include("../conexion/b.php");
              
     $proveedores = $bd->query('SELECT * FROM proveedores ORDER BY proveedor_id  desc' )->fetchAll(PDO::FETCH_OBJ);

    $r1 = $_POST['r1'];
    $r2 = $_POST['r2'];
    $r3 = $_POST['r3']; 
    $r4 = $_POST['r4']; 
    $r5 = $_POST['r5']; 
    $r6 = $_POST['r6']; 
?>
<div> <br><br> 
            <br>
            <br>    

            <h2>Actualizar datos del proveedor</h2>  
<div class="header-content">       
    </div>
        <!-- Formulario para Actualizar proveedor -->
        <section class="form-section" >
            <h2>Actualizar</h2>
            <form id="formularios" class="form-grid">
                <div class="left-side">
                <label for="id">ID</label>
                <input type="text" id="codigo" name="codigo" value="<?php echo $r1 ?>" required>

                <label for="Nit">Nit </label>
                <input type="text" id="nit" name="nit" value="<?php echo $r2 ?>" required>

                <label for="nombre">Nombre </label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $r3 ?>" required>

                <label for="direccion">Direccion </label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $r4 ?>" required>
                </div>
                <div class="right-side">
                <label for="Telefono">Telefono</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $r5 ?>">

                <label for="correo">Correo </label>
                <input type="text" id="correo" name="correo" value="<?php echo $r6 ?>" required>

                <button id="actualizarproveedor" class="btn1" type="submit">Actualizar proveedor</button> 
                </div>                
            </form>
        </section>
</div>