
<?php
    session_start(); 
      include("../conexion/b.php");
     
       
     $proyectos = $bd->query('SELECT * FROM proyectos ORDER BY proyecto_id  desc' )->fetchAll(PDO::FETCH_OBJ);
?>

<div> <br><br> 
            <br>
            <br>
        
            <h2>Lista de Proyectos</h2>  
<div class="header-content">
        
        <!-- Campo de búsqueda -->
        <section class="search-section">
            <input type="text" id="searchInput" placeholder="Buscar..." onkeyup="searchProjects()">
        </section>
         
    </div>
             

        <!-- Tabla de Proyectos -->
        <section>
        <table class="proyectos-table" id="projectsTable">
            <thead>
                <tr>
                    <th>ID Proyecto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Presupuesto</th>
                    <th>Acciones</th> <!-- Columna para los botones -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($proyectos as $d):?>
                <tr>
                    <td data-label="ID Proyecto"><?php echo $d->proyecto_id   ?></td>
                    <td data-label="Nombre"><?php echo $d->nombre  ?></td>
                    <td data-label="Descripción"><?php echo $d->descripcion  ?></td>
                    <td data-label="Fecha Inicio"><?php echo $d->fecha_inicio  ?></td>
                    <td data-label="Fecha Fin"><?php echo $d->fecha_fin  ?></td>
                    <td data-label="Presupuesto"><?php echo $d->presupuesto  ?></td>
                    <td data-label="Acciones">
                        <!-- Botones de acción para cada proyecto -->
                        <button class="btn-actualizar" id="mostrardetalleproyecto" value="<?php echo $d->proyecto_id ?>">Ver</button>
                 </td>
                </tr>               
                <?php endforeach; ?>  
            </tbody>
        </table>

</section>



<!-- Modal (inicialmente oculto) -->
<div id="modalProyecto">
    
</div>
  
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