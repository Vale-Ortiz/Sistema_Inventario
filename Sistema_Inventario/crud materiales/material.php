<?php
include('../conexion/conexion.php');

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$material_id = isset($_GET['material_id']) ? intval($_GET['material_id']) : null;
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";

// Limpiar el mensaje de sesión después de mostrarlo
unset($_SESSION['mensaje']);

// Insertar materiales
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insertar_material'])) {
    try {
        $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
        $descripcion = !empty($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8') : null;
        $stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;
        $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0;
        $proveedor_id = !empty($_POST['proveedor_id']) ? intval($_POST['proveedor_id']) : null;

        $sql = "INSERT INTO materiales (nombre, descripcion, stock, precio, proveedor_id) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssidi", $nombre, $descripcion, $stock, $precio, $proveedor_id);

        if ($stmt->execute()) {
            $_SESSION['mensaje'] = "Material insertado con éxito.";
        } else {
            $_SESSION['mensaje'] = "Error al insertar el material: " . $stmt->error;
        }
    } catch (Exception $e) {
        $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    }
    header("Location: material.php");
    exit();
}

// Actualizar materiales
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modificar_material'])) {
    try {
        $material_id = intval($_POST['material_id']);
        $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
        $descripcion = !empty($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8') : null;
        $stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;
        $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0;
        $proveedor_id = !empty($_POST['proveedor_id']) ? intval($_POST['proveedor_id']) : null;

        $sql = "UPDATE materiales 
                SET nombre = ?, descripcion = ?, stock = ?, precio = ?, proveedor_id = ?
                WHERE material_id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssidii", $nombre, $descripcion, $stock, $precio, $proveedor_id, $material_id);

        if ($stmt->execute()) {
            $_SESSION['mensaje'] = "Material modificado con éxito.";
        } else {
            $_SESSION['mensaje'] = "Error al modificar el material: " . $stmt->error;
        }
    } catch (Exception $e) {
        $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    }
    header("Location: material.php");
    exit();
}

// Eliminar materiales
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_material'])) {
    try {
        $material_id = intval($_POST['material_id']);

        $sql = "DELETE FROM materiales WHERE material_id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $material_id);

        if ($stmt->execute()) {
            $_SESSION['mensaje'] = "Material eliminado con éxito.";
        } else {
            $_SESSION['mensaje'] = "Error al eliminar el material: " . $stmt->error;
        }
    } catch (Exception $e) {
        $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    }
    header("Location: material.php");
    exit();
}

// Obtener y mostrar materiales
$sql = "SELECT material_id, nombre, descripcion, stock, precio, proveedor_id FROM materiales";
$result = $conexion->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Lista de Productos</h2>

    <!-- Botón para abrir el modal de inserción -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInsertar">
        Insertar Nuevo Producto
    </button>

    <!-- Tabla de productos -->
    <table class="table table-bordered table-hover mt-3">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Proveedor</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= htmlspecialchars($row['Nombre']) ?></td>
                <td><?= htmlspecialchars($row['Descripcion']) ?></td>
                <td><?= htmlspecialchars($row['Stock']) ?></td>
                <td><?= htmlspecialchars($row['Precio']) ?></td>
                <td><?= htmlspecialchars($row['Proveedor_id']) ?></td>
                <td>
                    <form method="post" class="d-inline" onsubmit="return confirm ('¿Estas seguro de que deseas eliminar el producto?');">
                        <input type="hidden" name="id_producto" value="<?= $row['material_id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm" name="eliminar_producto">Eliminar</button>
                    </form>
                    <!-- Botón para modificar -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalModificar<?= $row['material_id'] ?>">
                        Modificar
                    </button>
                </td>
            </tr>
            <!-- Modal de Modificación -->
            <div class="modal fade" id="modalModificar<?= $row['material_id'] ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modificar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <input type="hidden" name="id_producto" value="<?= $row['material_id'] ?>">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($row['Nombre']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <input type="number" class="form-control" name="descripcion" value="<?= htmlspecialchars($row['Descripcion']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cantidad" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" name="cantidad" value="<?= htmlspecialchars($row['Stock']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <textarea class="form-control" name="precio" rows="3"><?= htmlspecialchars($row['Precio']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="proveedor_id" class="form-label">Proveedor</label>
                                    <input type="number" class="form-control" name="proveedor_id" value="<?= htmlspecialchars($row['proveedor_id']) ?>" required>
                                </div>                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="modificar_producto">Guardar Cambios</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Modal de Inserción -->
<div class="modal fade" id="modalInsertar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insertar Nuevo Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" required>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="proveedor_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="proveedor_id" class="form-label">Proveedor</label>
                        <input type="text" class="form-control" name="descripcion" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="insertar_producto">Guardar Producto</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>