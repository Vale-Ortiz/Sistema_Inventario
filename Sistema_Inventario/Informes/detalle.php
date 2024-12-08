<?php 
include("../conexion/b.php");
$detalleproyecto = $bd->query('SELECT otorgamientos.otorgamiento_id,otorgamientos.proyecto_id, proyectos.proyecto_id,proyectos.nombre as nompro,proyectos.descripcion,proyectos.fecha_inicio, proyectos.fecha_fin,proyectos.presupuesto, otorgamientos.fecha, otorgamientos.usuario_id as  ususu
, usuarios.nombre as  usr, detalle_otorgamientos.id_otorgamiento, detalle_otorgamientos.otorgamiento, detalle_otorgamientos.material, 
materiales.material_id, materiales.nombre as mannon, materiales.precio, detalle_otorgamientos.cantidad 
 FROM otorgamientos,proyectos,usuarios,detalle_otorgamientos, materiales WHERE otorgamientos.proyecto_id=proyectos.proyecto_id
  AND otorgamientos.usuario_id= usuarios.usuario_id AND otorgamientos.otorgamiento_id= detalle_otorgamientos.otorgamiento
   AND detalle_otorgamientos.material = materiales.material_id AND otorgamientos.proyecto_id ='.$_POST['proyecto_id'].'
            ')->fetchAll(PDO::FETCH_OBJ);

$idproyectos = $_POST['proyecto_id'];
 $tota=0;
?>        
  <style>
       

        .container {
            max-width: 1000px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 8px;
           
        }

        h5 {
            font-size: 20px;
            color: #555;
            margin-bottom: 10px;
        }

        h4 {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #BFC9CA;
            color: #333;
            font-weight: bold;
        }

        .table td {
            font-size: 14px;
        }

        .negrita {
            font-weight: bold;
            font-size: 18px;
        }

        .total-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .total-container input {
            font-size: 18px;
            padding: 5px 10px;
            width: 150px;
            text-align: right;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f7f7f7;
        }

        .table-bordered {
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table th, .table td {
            border-bottom: 1px solid #ddd;
        }
    </style>      

<?php foreach($detalleproyecto as $deta):?> 

<?php 
 $d1=$deta->nompro;
 $d2=$deta->proyecto_id;
 $d3=$deta->fecha_inicio;
 $d4=$deta->fecha_fin;
 $d5=$deta->presupuesto;
 $d8=$deta->fecha;
 $d9=$deta->usr;
 ?>

<?php endforeach; ?> 
<div class="container">
    <div>
        <h5>Fecha Otorgamiento <?php echo $d8; ?></h5>

        <table class="table table-bordered table-hover">
            <tr>
                <th>#Proyecto:</th>
                <td><?php echo $d2 ?></td>
            </tr>
            <tr>
                <th>Proyecto:</th>
                <td><?php echo $d1 ?></td>
            </tr>
            <tr>
                <th>Fecha Inicio:</th>
                <td><?php echo $d3 ?></td>
            </tr>
            <tr>
                <th>Fecha Fin:</th>
                <td><?php echo $d4 ?></td>
            </tr>
            <tr>
                <th>Presupuesto:</th>
                <td><?php echo $d5 ?></td>
            </tr>
        </table>

        <div>
            <h5>Material Asignado</h5>
            <table class="table table-bordered table-hover">
                <tr class="negrita">
                    <td>Cód</td>
                    <td>Nombre</td>
                    <td>Cantidad</td>
                    <td>Valor</td>
                    <td>Subtotal</td>
                </tr>
                <?php foreach($detalleproyecto as $deto): ?>
                    <tr>
                        <td><?php echo $deto->material_id ?></td>
                        <td><?php echo $deto->mannon ?></td>
                        <td><?php echo $deto->cantidad ?></td>
                        <td><?php echo $deto->precio ?></td>
                        <td><?php echo $deto->precio * $deto->cantidad ?></td>
                    </tr>
                    <?php 
                        $tota = $tota + ($deto->precio * $deto->cantidad);
                    ?>
                <?php endforeach; ?>
            </table>
            
            <div class="total-container">
                <div class="negrita">Total:</div>
                <input type="text" value="$<?php echo number_format($tota); ?>" readonly>
            </div>
        </div>
    </div>
</div>