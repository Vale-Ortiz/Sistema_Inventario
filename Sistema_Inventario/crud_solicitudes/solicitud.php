<?php
    session_start(); 
      include("../conexion/b.php");
      $iduser = $_SESSION['usuario_id'];
 $proyectos = $bd->query('SELECT * FROM proyectos' )->fetchAll(PDO::FETCH_OBJ);
  $solicitudes = $bd->query('SELECT solicitudes.id_solicitudes,proyectos.nombre 
  as pronombre,solicitudes.descrip_solicitud, usuarios.nombre 
  as usunombre, solicitudes.fecha_solicitud  
  FROM solicitudes, proyectos, usuarios 
  WHERE solicitudes.proyecto_solicitud = proyectos.proyecto_id 
  AND solicitudes.user_solicitud = usuarios.usuario_id 
  AND user_solicitud= '.$iduser.' ORDER BY id_solicitudes   desc' )->fetchAll(PDO::FETCH_OBJ);
?>
<div> <br><br> 
            <br>
            <br>      
            <h2>Lista de Solicitudes</h2>  

<div class="header-content">
        
        <!-- Campo de búsqueda -->
        <section class="search-section">
            <input type="text" id="searchInput" placeholder="Buscar..." onkeyup="searchProjects()">
        </section>
         <!-- Botón para mostrar el formulario -->
         <button onclick="toggleForm()"><h3>Nueva Solicitud</h3></button>
    </div>
        <!-- Formulario para agregar proyectos -->
        <section class="form-section" id="formSection" style="display: none;">
            <h2>Agregar Materiales</h2>
            <form id="formularios" class="form-grid">
                <div class="left-side">

                <label for="nombre">Seleccionar Proyecto </label>
                <select style="font-size: 20px; width: 300px;" name="proyec" id="proyec" class="form-control" required>
                                    <option value="" disabled selected>Seleccionar Proyecto</option> <!-- Opción por defecto que no se puede seleccionar -->
                                    <?php foreach ($proyectos as $p) {
                                        echo "<option value='" . $p->proyecto_id . "'>" . $p->nombre . "</option>";
                                    } ?>
                </select>

                <label for="des">Descripcion </label>
                <textarea id="descris" name="descris"></textarea>
                   
                </div>
                <div class="right-side">
                <br><br>
                <input style="visibility: hidden;" type="text" name="usua" id="usua" value="<?php echo $iduser; ?>" class="form-control" readonly>

                <button id="guardarsolisitud" class="btn1" type="submit">Enviar Solicitud</button> 
                </div>
                
            </form>
        </section>

        

        <!-- Tabla de Materiales -->
        <section>
        <table class="proyectos-table" id="projectsTable">
            <thead>
                <tr>
                    <th>Codigo </th>
                    <th>Proyecto</th>
                    <th>Descripcion </th>
                    <th>Ingeniero</th>
                    <th>Fecha</th>        
                    <th>Acciones</th> <!-- Columna para los botones -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($solicitudes as $d):?>
                <tr>
                    <td data-label="Codigo"><?php echo $d->id_solicitudes      ?></td>
                    <td data-label="Proyecto "><?php echo $d->pronombre  ?></td>
                    <td data-label="Proyecto"><?php echo $d->descrip_solicitud   ?></td>
                    <td data-label="Ingeniero"><?php echo $d->usunombre   ?></td>
                    <td data-label="Fecha"><?php echo $d->fecha_solicitud  ?></td>  
                    <td data-label="Acciones">                        
                        <button id="eliminarsolicitudes" class="btn-eliminar" value="<?php echo $d->id_solicitudes ?>">Eliminar</button>
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



     $('#proyec').select2({
        placeholder: "Buscar Proyecto...",  // Texto que aparece cuando el select está vacío
        allowClear: true  // Permite borrar la selección
    });
    </script>

</div>   



