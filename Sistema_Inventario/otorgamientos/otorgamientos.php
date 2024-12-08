
<?php
    session_start(); 
      include("../conexion/b.php");  
     $proyectos = $bd->query('SELECT * FROM proyectos' )->fetchAll(PDO::FETCH_OBJ);
     $Materiales = $bd->query('SELECT * FROM materiales' )->fetchAll(PDO::FETCH_OBJ);
     include("modelo.php"); 
     $iduser = $_SESSION['usuario_id']; 
     $total=0;     
?>
<div><br><br><br><br>
        <!-- Formulario para agregar proyectos -->
        <section class="form-section" id="formSection">
            <h2>Otorgamiento de Materiales</h2>
            <form id="formulario" class="form-grid">
                <div class="left-side">
                    <div class="left-side">                     
                    <label for="proyecto">Seleccionar Proyecto</label>                               
                                <div class="right-side">
                                <div style="display: flex; align-items: center; gap: 20px;">
                                <div>
                                <select style="font-size: 20px; width: 300px;" name="proyecto" id="proyecto" class="form-control" required>
                                    <option value="" disabled selected>Seleccione un Proyecto</option> <!-- Opción por defecto que no se puede seleccionar -->
                                    <?php foreach ($proyectos as $p) {
                                        echo "<option value='" . $p->proyecto_id . "'>" . $p->nombre . "</option>";
                                    } ?>
                                </select>


                                </div>        
                                <input style="visibility: hidden;" type="text" name="usua" id="usua" value="<?php echo $iduser; ?>" class="form-control" readonly>
                                <button style = "font-size: 15px" type="submit" id="btnSeleccionarproyecto" name="Seleccionarproyecto"  class="btn btn-primary form-control">Seleccionar</button>
                                </div>  
                            <tr>
                                <th style = "font-size: 13px"> Proyecto Seleccionado: </th><td><?php echo $p2 ?></td>                                 
                             </tr>                            
                             </div>
                        </div>
                        <div class="left-side"><br>
                                <label for="proyecto">Agregar Materiales</label>
                                <div class="right-side">
                                <div style="display: flex; align-items: center; gap: 20px;">
                                <div>
                                     <select style="font-size: 20px; width: 300px;" type="text" name="numser_codigo" id="numser_codigo" class="form-control" required>
                                        <?php foreach ($Materiales as $m) {
                                            echo "<option value='".$m->material_id."'>".$m->nombre."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="inputEmail4" class="form-label">Cantidad</label>
                                    <input style="font-size: 13px; width: 80px;" type="number" name="cantidad" id="cantidad" min="1" value="1" class="form-control" required>
                                </div>                              
                                        
                                                <button type="submit" name="agregar2" id="btnagregarmaterial"  class="btn btn-primary btn-sm form-control"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                                                    <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z"/>
                                                </svg> </button>
                               </div>                              
                             </div>
                        </div>
                </div>

                
                <div class="right-side">
                      <!-- Contenedor de la tabla con bordes, padding y espaciado -->
                       <br><h4>Materiales Otorgados</h4><br>
                    <div class="table-container" style="max-width: 100%; overflow-x: auto;">
                        <table class="table table-bordered table-hover" style="width: 100%; border-collapse: collapse;">
                            <thead style="background-color: #3b3b3a; color: white; text-align: center;">
                                <tr>
                                    <th style="font-size: 14px; padding: 10px;"> Nº </th>
                                    <th style="font-size: 14px; padding: 10px;"> Nombre </th>
                                    <th style="font-size: 14px; padding: 10px;"> Cantidad </th>
                                    <th style="font-size: 14px; padding: 10px;"> Precio </th>
                                    <th style="font-size: 14px; padding: 10px;"> Subtotal </th>
                                    <th style="font-size: 14px; padding: 10px;"> Eliminar </th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">

                                <?php foreach ($list as $k): ?>     
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="font-size: 12px; padding: 10px;"><?php echo $k->material_id; ?></td>
                                        <td style="font-size: 12px; padding: 10px;"><?php echo $k->nombre; ?></td>
                                        <td style="font-size: 12px; padding: 10px;"><?php echo $k->cantidadmaterial; ?></td>
                                        <td style="font-size: 12px; padding: 10px;"><?php echo "$" . number_format($k->precio, 2); ?></td>
                                        <td style="font-size: 12px; padding: 10px;"><?php echo "$" . number_format($k->precio * $k->cantidadmaterial, 2); ?></td>
                                        <td title="Eliminar" style="padding: 10px;">
                                            <a href="#" id="eliminarDetallematerial" detalle="<?php echo $k->material_id; ?>" 
                                            class="btn btn-danger btn-sm" aria-label="Eliminar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        $subtotal = $k->cantidadmaterial * $k->precio;
                                        $total = $total + $subtotal;
                                    ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                        <!-- Mostrar el total al final -->
                        <div style="text-align: right; font-size: 16px; font-weight: bold; padding-top: 10px;">
                            <span>Total: </span><span><?php echo "$" . number_format($total, ); ?></span>
                        </div>
                </div>


                <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-2">
                                    <div class="pull-right">
                                        <button type="submit"  name="cancelarotoramientos" id="btncancelar1" class="btn btn-danger">
                                            Cancelar</button>
                                        <button type="submit" name="guardarotorgamientos" id="btnguardarotorgar" class="btn btn-primary">
                                            Otorgar</button>
                                    </div>
                                </div>
                         </div>
                
            </form>
        </section>
        
    </div>

    
</div>   

<!-- Iniciar Select2 -->
<script>
$(document).ready(function() {
    $('#proyecto').select2({
        placeholder: "Buscar proyecto...",  // Texto que aparece cuando el select está vacío
        allowClear: true  // Permite borrar la selección
    });
    $('#numser_codigo').select2({
        placeholder: "Buscar proyecto...",  // Texto que aparece cuando el select está vacío
        allowClear: true  // Permite borrar la selección
    });

    
});
</script>