<?php
    session_start(); 
      include("../conexion/b.php");
              
     $usuarios = $bd->query('SELECT * FROM usuarios ORDER BY usuario_id  desc' )->fetchAll(PDO::FETCH_OBJ);
?>
<div> <br><br> 
            <br>
            <br>
        
            <h2>Lista de Usuarios</h2>  
<div class="header-content">
        
        <!-- Campo de búsqueda -->
        <section class="search-section">
            <input type="text" id="searchInput" placeholder="Buscar..." onkeyup="searchProjects()">
        </section>
         <!-- Botón para mostrar el formulario -->
         <button onclick="toggleForm()"><h3>Agregar Usuario</h3></button>
    </div>
        <!-- Formulario para agregar usuarios -->
        <section class="form-section" id="formSection" style="display: none;">
            <h2>Agregar Usuario</h2>
            <form id="formularios" class="form-grid">
                <div class="left-side">
                    <label for="nombre">Nombre </label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="correo">Correo </label>
                    <input type="text" id="correo" name="correo" required>
                </div>
                <div class="right-side">
                <label for="contraseña">Contraseña</label>
                <input type="text" id="contraseña" name="contraseña">
                <label for="nombre">Seleccione un rol </label>
                <select id="rol" name="rol" required>
                    <option value="">Seleccione un rol</option>
                    <option value="gestor">Gestor</option>
                    <option value="ingeniero">Ingeniero</option>
                </select><br><br>
                <button id="guardarusuario" class="btn1" type="submit">Guardar Usuarios</button> 
                </div>
                
                
               
            </form>
        </section>

        

        <!-- Tabla de Proyectos -->
        <section>
        <table class="proyectos-table" id="projectsTable">
            <thead>
                <tr>
                    <th>ID usuario </th>
                    <th>Nombre</th>
                    <th>Correo </th>
                    <th>Contraseña</th>
                    <th>Rol</th>                    
                    <th>Acciones</th> <!-- Columna para los botones -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $d):?>
                <tr>
                    <td data-label="ID"><?php echo $d->usuario_id    ?></td>
                    <td data-label="Nombre"><?php echo $d->nombre  ?></td>
                    <td data-label="Correo"><?php echo $d->correo   ?></td>
                    <td data-label="Contraseña"><?php echo str_repeat('.', 5); ?></td>
                    <td data-label="Rol"><?php echo $d->rol  ?></td>                    
                    <td data-label="Acciones">
                    <button id="editarusuario" data-r1="<?php echo $d->usuario_id?>"
                                                            data-r2="<?php echo $d->nombre?>"
                                                            data-r3="<?php echo $d->correo?>"
                                                            data-r4="<?php echo $d->contraseña?>"
                                                            data-r5="<?php echo $d->rol ?>"class="btn-actualizar" >Actualizar</button>
                    <button id="eliminarusuario" class="btn-eliminar" value="<?php echo $d->usuario_id ?>">Eliminar</button>
                    </td>
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
    </div>