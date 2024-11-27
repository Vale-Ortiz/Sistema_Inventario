
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
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3> 
                    <p>Inicia Sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3> 
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>
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
                <!--Registro-->
                <form action="registrar_usuario.php" method="post" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name="nombre" required>
                    <input type="text" placeholder="Correo Electronico" name="correo" required>
                    <input type="password" placeholder="Contraseña" name="contraseña" required>
                    <select name="rol" required>
                        <option value="" >Seleccione un rol</option>
                        <option value="admin">Admin</option>
                        <option value="gestor">Gestor</option>
                        <option value="ingeniero">Ingeniero</option>
                    </select>
                    <button type="submit">Regístrarse</button>
                </form>
            </div>
        </div>
    </main>    
    <script src="../media/js/script.js"></script>
</body>
</html>