<?php include 'menu.php'; ?>
<html>
    <head>
        <title>Iniciar sesión</title>
        <script src="./js/inicio_sesion.js"></script>
        <script src="./js/jquery-3.3.1.min.js"></script>
    </head>
    <body class="main">
        <div class="wrap">
            <div class="contenedor contenedorLogin">
                <div>
                    <form name="ingreso" method="post">
                        <h1>Iniciar sesión</h1>
                        <input class="inputLogin" type="text" name="correoLog" id="correolog" placeholder="Correo" required/><br>
                        <input class="inputLogin" type="password" name="passwordLog" id="passwordLog" placeholder="Contraseña" required/><br>
                        <input class="botonContacto" id="ingresar" type="submit" onclick="ingresa(); return false;" value="Ingresar"/>

                    </form>
                </div>
            </div>
            <div class="contenedor contenedorLogin">
                <div>
                    <form name="registro" method="post">
                        <h3>¿No tienes cuenta?</h3>
                        <h1>Registrarse</h1>
                        <input class="inputLogin" type="text" name="nombre" id="nombre" placeholder="Nombre" required/><br>
                        <input class="inputLogin" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required/><br>
                        <input class="inputLogin" type="text" name="correoReg" id="correoReg" placeholder="Correo" required onblur="validarCorreo();"/><br>
                        <input class="inputLogin" type="password" name="passwordReg" id="passwordReg" placeholder="Contraseña" required/><br>
                        <input class="botonContacto" id="registrar" type="submit" onclick="registrarse(); return false;" value="Registrarse"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include 'footer.php'; ?>