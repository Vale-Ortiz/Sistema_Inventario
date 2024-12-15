<?php
    session_start(); 
      include("../conexion/b.php");
 $proveedorr = $bd->query('SELECT * FROM proveedores' )->fetchAll(PDO::FETCH_OBJ);

  $materiales = $bd->query('SELECT materiales.material_id,materiales.nombre,materiales.descripcion,materiales.stock,materiales.precio,materiales.proveedor_id, proveedores.proveedor_id, proveedores.nombre AS provee FROM materiales, proveedores WHERE materiales.proveedor_id = proveedores.proveedor_id ORDER BY material_id  desc' )->fetchAll(PDO::FETCH_OBJ);
?>
<div> <br><br> 
            <br>
            <br>        
            <h2>Lista de Materiales</h2>  
<div class="header-content">
        
        <!-- Campo de búsqueda -->
        <section class="search-section">
            <input type="text" id="searchInput" placeholder="Buscar..." onkeyup="searchProjects()">
        </section>
         <!-- Botón para mostrar el formulario -->
         <button onclick="toggleForm()"><h3>Agregar Material</h3></button>
    </div>
        <!-- Formulario para agregar proyectos -->
        <section class="form-section" id="formSection" style="display: none;">
            <h2>Agregar Materiales</h2>
            <form id="formularios" class="form-grid">
                <div class="left-side">
                    <label for="nombre">Nombre Articulo </label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="des">Descripcion </label>
                    <textarea id="descri" name="descri"></textarea>
                   
                </div>
                <div class="right-side">
                <label for="Stock">Cantidad</label>
                <input type="number" id="Stock" name="Stock">
                <label for="Precio">Precio Unitario</label>
                <input type="number" id="Precio" name="Precio">
                <label for="nombre">Seleccione un Proveedor </label>
                <select style="font-size: 24px; width: 440px;" name="prov" id="prov" class="form-control" required>
                                    <option value="" disabled selected>Seleccione un proveedor</option> <!-- Opción por defecto que no se puede seleccionar -->
                                    <?php foreach ($proveedorr as $pp) {
                                        echo "<option value='" . $pp->proveedor_id . "'>" . $pp->nit ." ".$pp->nombre . "</option>";
                                    } ?>
                </select><br><br>
                <button id="guardarmaterial" class="btn1" type="submit">Guardar Material</button> 
                </div>
                
            </form>
        </section>

        

        <!-- Tabla de Materiales -->
        <section>
        <table class="proyectos-table" id="projectsTable">
            <thead>
                <tr>
                    <th>ID material </th>
                    <th>Nombre</th>
                    <th>Descripcion </th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>                    
                    <th>proveedor</th>                    
                    <th>Acciones</th> <!-- Columna para los botones -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($materiales as $d):?>
                <tr>
                    <td data-label="ID"><?php echo $d->material_id     ?></td>
                    <td data-label="Nombre"><?php echo $d->nombre  ?></td>
                    <td data-label="Descripcion"><?php echo $d->descripcion   ?></td>
                    <td data-label="Cantidad"><?php echo $d->stock  ?></td>
                    <td data-label="Stock"><?php echo $d->precio  ?></td>                    
                    <td data-label="proveedor"><?php echo $d->provee   ?></td>                    
                    <td data-label="Acciones">
                        <!-- Botones de acción para cada material -->
                        <button id="editarmaterial" data-r1="<?php echo $d->material_id?>"
                                                            data-r2="<?php echo $d->nombre?>"
                                                            data-r3="<?php echo $d->descripcion?>"
                                                            data-r4="<?php echo $d->stock ?>"
                                                            data-r5="<?php echo $d->precio ?>"
                                                            data-r6="<?php echo $d->provee ?>" class="btn-actualizar" >Actualizar</button>
                        <button id="eliminarmaterial" class="btn-eliminar" value="<?php echo $d->material_id ?>">Eliminar</button>
                    </td>
                </tr>               
                <?php endforeach; ?>  
            </tbody>
        </table>

</section>


    </div>

    <!-- Script de búsqueda -->
    <script>
        function searchProjects() {
            var input = document.getElementById('searchInput');
            var filter = input.value.toLowerCase();
            var table = document.getElementById('projectsTable');
            var rows = table.getElementsByTagName('tr');

            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var found = false;

                for (var j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        if (cells[j].textContent.toLowerCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }

                if (found) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        function toggleForm() {
            var formSection = document.getElementById('formSection');
            // Cambiar la visibilidad del formulario (toggle)
            if (formSection.style.display === "none") {
                formSection.style.display = "block";
            } else {
                formSection.style.display = "none";
            }
        }



     $('#prov').select2({
        placeholder: "Buscar Proveedor...",  // Texto que aparece cuando el select está vacío
        allowClear: true  // Permite borrar la selección
    });
    </script>

</div>   

