<?php
require ('conexion/conexion.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $contraseña = trim($_POST['contraseña']);
    $rol = trim($_POST['rol']);

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($correo) && !empty($contraseña) && !empty($rol)) {
        // Encriptar la contraseña
        $contraseña_hashed = password_hash($contraseña, PASSWORD_DEFAULT);

        // Preparar consulta para insertar el usuario
        $sql = "INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (?, ?, ?, ?)";

        if ($stmt = $conexion->prepare($sql)) {
            // Vincular parámetros
            $stmt->bind_param("ssss", $nombre, $correo, $contraseña_hashed, $rol);

            // Ejecutar consulta
            if ($stmt->execute()) {
                // Redirigir al login si el registro es exitoso
                header("Location: login.php");
                exit;
            } else {
                echo "Error al registrar el usuario: " . $conexion->error;
            }

            // Cerrar el statement
            $stmt->close();
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}

$conexion->close();