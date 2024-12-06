<?php
    session_start(); 
      include("../conexion/b.php");
              
     $proveedores = $bd->query('SELECT * FROM proveedores ORDER BY proveedor_id  desc' )->fetchAll(PDO::FETCH_OBJ);
?>
<div> <br><br> 
            <br>
            <br>        
            <h2>Lista de Proveedores</h2>  
<div class="header-content">
        
        <!-- Campo de búsqueda -->
        <section class="search-section">
            <input type="text" id="searchInput" placeholder="Buscar..." onkeyup="searchProjects()">
        </section>
         <!-- Botón para mostrar el formulario -->
         <button onclick="toggleForm()"><h3>Agregar Proveedor</h3></button>
    </div>
        <!-- Formulario para agregar proyectos -->
        <section class="form-section" id="formSection" style="display: none;">
            <h2>Agregar Proveedor</h2>
            <form id="formularios" class="form-grid">
                <div class="left-side">
                      <label for="Nit">Nit </label>
                    <input type="text" id="nit" name="nit" required>
                    <label for="nombre">Nombre </label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="direccion">Direccion </label>
                    <input type="text" id="direccion" name="direccion" required>
                </div>
                <div class="right-side">
                <label for="Telefono">Telefono</label>
                <input type="text" id="telefono" name="telefono">
                <label for="correo">Correo </label>
                <input type="text" id="correo" name="correo" required><br><br>
                <button id="guardarproveedores" class="btn1" type="submit">Guardar Proveedor</button> 
                </div>
                
                
               
            </form>
        </section>

        

        <!-- Tabla de Proyectos -->
        <section>
        <table class="proyectos-table" id="projectsTable">
            <thead>
                <tr>
                    <th>ID usuario </th>
                    <th>Nit</th>
                    <th>Nombre </th>
                    <th>Direccion</th>
                    <th>Telefono</th>                    
                    <th>Email</th>                    
                    <th>Acciones</th> <!-- Columna para los botones -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($proveedores as $d):?>
                <tr>
                    <td data-label="Id"><?php echo $d->proveedor_id     ?></td>
                    <td data-label="Nit"><?php echo $d->nit   ?></td>
                    <td data-label="Nombre"><?php echo $d->nombre   ?></td>
                    <td data-label="Direccion"><?php echo $d->direccion  ?></td>
                    <td data-label="Telefono"><?php echo $d->telefono  ?></td>                    
                    <td data-label="Email"><?php echo $d->email  ?></td>                    
                    <td data-label="Acciones">
                        <!-- Botones de acción para cada proyecto -->
                        <button id="editarproveedor" class="btn-actualizar" onclick="actualizarProyecto(1)">Actualizar</button>
                        <button id="eliminarproveedor" class="btn-eliminar" value="<?php echo $d->proveedor_id ?>">Eliminar</button>
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
    </script>

</div>   