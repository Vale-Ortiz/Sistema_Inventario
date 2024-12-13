<?php
    session_start(); 
      include("../conexion/b.php");
            $proveedorr = $bd->query('SELECT * FROM proveedores' )->fetchAll(PDO::FETCH_OBJ);

            $materiales = $bd->query('SELECT materiales.material_id,materiales.nombre,materiales.descripcion,materiales.stock,materiales.precio,materiales.proveedor_id, proveedores.proveedor_id, proveedores.nombre AS provee FROM materiales, proveedores WHERE materiales.proveedor_id = proveedores.proveedor_id ORDER BY material_id  desc' )->fetchAll(PDO::FETCH_OBJ);


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
            <h2>Actualizar datos del Material</h2>  
<div class="header-content">        
    </div>
        <!-- Formulario para agregar proyectos -->
        <section class="form-section" id="formSection" style="display: none;">
            <h2>Actualizar</h2>
            <form id="formularios" class="form-grid">
                <div class="left-side">

                <label for="id">ID</label>
                <input type="text" id="codigo" name="codigo" value="<?php echo $r6 ?>" required>

                    <label for="nombre">Nombre Articulo </label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $r1 ?> required>

                    <label for="des">Descripcion </label>
                    <textarea id="descri" name="descri"><?php echo $r2 ?></textarea>
                   
                </div>
                <div class="right-side">
                <label for="Stock">Cantidad</label>
                <input type="number" id="Stock" name="Stock" value="<?php echo $r3 ?>">
                <label for="Precio">Precio Unitario</label>
                <input type="number" id="Precio" name="Precio" value="<?php echo $r4 ?>">
                <label for="nombre">Seleccione un Proveedor </label>
                <select style="font-size: 24px; width: 440px;" name="prov" id="prov" class="form-control" value="<?php echo $r5 ?>" required>
                                    <option value="" disabled selected>Seleccione un proveedor</option> <!-- Opción por defecto que no se puede seleccionar -->
                                    <?php foreach ($proveedorr as $pp) {
                                        echo "<option value='" . $pp->proveedor_id . "'>" . $pp->nit ." ".$pp->nombre . "</option>";
                                    } ?>
                </select><br><br>
                <button id="actualizarmaterial" class="btn1" type="submit">Actualizar Material</button> 
                </div>
                
            </form>
        </section>
</div>