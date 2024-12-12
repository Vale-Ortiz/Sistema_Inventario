<?php
    session_start(); 
      include("../conexion/b.php");  
       
     $proyectos = $bd->query('SELECT * FROM proyectos ORDER BY proyecto_id  desc' )->fetchAll(PDO::FETCH_OBJ);

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
        
            <h2>Actualizar datos del Proyecto</h2>  
<div class="header-content">
        

    </div>
        <!-- Formulario para agregar proyectos -->
        <section class="form-section" >
            <h2>Actualizar</h2>
            <form id="formulario" class="form-grid">
                <div class="left-side">
                <label for="id">ID</label>
                <input type="text" id="codigo" name="codigo" value="<?php echo $r1 ?>" required>

                    <label for="nombre">Nombre del Proyecto</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $r2 ?>" required>

                    <label for="descripcion">Descripción</label>
                    <textarea type="text" id="descripcion" name="descripcion" ><?php echo $r3 ?></textarea>
                </div>
                <div class="right-side">
                    <div class="input-group">
                        <label for="fecha_inicio">Fecha de Inicio</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $r4 ?>">

                        <label for="fecha_fin">Fecha de Fin</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $r5 ?>">
                    </div>

                    <label for="presupuesto">Presupuesto</label>
                    <input type="number" id="presupuesto" name="presupuesto" step="0.01" value="<?php echo $r6 ?>">

                    <button id="actualizarproyecto" class="btn1" type="submit">Actualizar proyecto</button>
                </div>
            </form>
        </section>
</div>   