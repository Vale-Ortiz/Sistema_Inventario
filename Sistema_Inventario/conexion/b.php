<?php 
try {
    // Crear la conexión a la base de datos
    $bd = new PDO("mysql:host=localhost;dbname=sistemas_inventario", "root", "");
    // Establecer el modo de manejo de errores
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Establecer la codificación de caracteres en UTF-8
    $bd->exec("SET CHARACTER SET UTF8");
} catch (PDOException $e) {
    // Mostrar el mensaje de error y la línea del error
    die("Error: " . $e->getMessage() . " en la línea " . $e->getLine());
}
?>
