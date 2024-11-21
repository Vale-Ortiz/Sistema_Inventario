<?php
include ('conexion/conexion.php');

// Inicializar variable para errores
$error = "";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $correo = trim($_POST['correo']);
    $contraseña = trim($_POST['contraseña']);

    // Validar que no estén vacíos
    if (!empty($correo) && !empty($contraseña)) {
        // Preparar consulta para buscar al usuario
        $sql = "SELECT * FROM usuarios WHERE correo = ?";
        if ($stmt = $conexion->prepare($sql)) {
            // Vincular parámetros
            $stmt->bind_param("s", $correo);

            // Ejecutar consulta
            $stmt->execute();

            // Obtener resultados
            $resultado = $stmt->get_result();

            // Verificar si el usuario existe
            if ($resultado->num_rows === 1) {
                $usuario = $resultado->fetch_assoc();

                // Verificar la contraseña
                if (password_verify($contraseña, $usuario['contraseña'])) {
                    // Guardar datos en la sesión
                    $_SESSION['usuario_id'] = $usuario['usuario_id'];
                    $_SESSION['nombre'] = $usuario['nombre'];
                    $_SESSION['rol'] = $usuario['rol'];

                    // Redirigir según el rol
                    switch ($usuario['rol']) {
                        case 'admin':
                            header("Location: roles/index_admin.php");
                            break;
                        case 'gestor':
                            header("Location: roles/index_gestor.php");
                            break;
                        case 'ingeniero':
                            header("Location: roles/index_ingeniero.php");
                            break;
                        default:
                            $error = "Rol desconocido.";
                            break;
                    }
                    exit;
                } else {
                    $error = "Contraseña incorrecta.";
                }
            } else {
                $error = "El correo no está registrado.";
            }
            // Cerrar statement
            $stmt->close();
        } else {
            $error = "Error en la consulta: " . $conexion->error;
        }
    } else {
        $error = "Por favor, complete todos los campos.";
    }
}

// Cerrar conexión
$conexion->close();