<?php
    session_start(); 
      include("../conexion/b.php");

    $proveedorr = $bd->query('SELECT * FROM proveedores' )->fetchAll(PDO::FETCH_OBJ);
    $materiales = $bd->query('SELECT materiales.material_id,materiales.nombre,materiales.descripcion,
    materiales.stock,materiales.precio,materiales.proveedor_id, proveedores.proveedor_id, proveedores.nombre
    AS provee FROM materiales, proveedores WHERE materiales.proveedor_id = proveedores.proveedor_id ORDER BY material_id  desc' )->fetchAll(PDO::FETCH_OBJ);


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
        <!-- Formulario para Actualizar material -->
        <section class="form-section" >
            <h2>Actualizar</h2>
            <form id="formulario" class="form-grid">
                <div class="left-side">
                <label for="id">ID</label>
                <input type="text" id="codigo" name="codigo" value="<?php echo $r1?>" required>

                    <label for="nombre">Nombre Articulo </label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $r2?>" required>

                    <label for="des">Descripcion </label>
                    <textarea id="descri" name="descri"><?php echo $r3?></textarea>
                   
                </div>
                <div class="right-side">
                <label for="Stock">Cantidad</label>
                <input type="number" id="Stock" name="Stock" value="<?php echo $r4 ?>">

                <label for="Precio">Precio Unitario</label>
                <input type="number" id="precio" name="precio" value="<?php echo $r5 ?>">

                <label for="nombre">Seleccione un Proveedor </label>
                <select id="prov" name="prov" required>
                    <option value="">Seleccione un proveedor</option>
                    <?php foreach ($proveedorr as $pp): ?>
                        <option value="<?php echo $pp->proveedor_id; ?>" 
                            <?php echo $pp->proveedor_id == $r6 ? 'selected' : ''; ?>>
                                <?php echo $pp->nit . " " . $pp->nombre; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button id="actualizarmaterial" class="btn1" type="submit">Actualizar Material</button> 
                </div>                
            </form>
        </section>
</div>