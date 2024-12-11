
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../media/css/style.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="contenedor__todo">            
            <!--Formulario de login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="login.php" method="post" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="hidden" name="action" value="login">
                    <input type="text" placeholder="Correo Electronico" name="correo" required>
                    <input type="password" placeholder="Contraseña" name="contraseña" required>
                    <button type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </main>    
    <script src="../media/js/script.js"></script>
</body>
</html>