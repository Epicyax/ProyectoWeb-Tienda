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
                    <div id="err-msg-login" class="err-msg" hidden></div>
                    <form name="ingreso" method="post">
                        <h1>Iniciar sesión</h1>
                        <input class="inputLogin" type="email" name="correoLog" id="correolog" placeholder="Correo" required/><br>
                        <input class="inputLogin" type="password" name="passwordLog" id="passwordLog" placeholder="Contraseña" required/><br>
                        <input class="botonContacto" id="ingresar" type="submit" onclick="ingresa(); return false;" value="Ingresar"/>
                    </form>
                </div>
            </div>
            <p style="margin-top:auto; margin-bottom:auto; font-size:30px;">
                Ó
            </p>
            <div class="contenedor contenedorLogin">
                <div>
                    <div id="err-msg-registro" class="err-msg" hidden></div>
                    <form name="registro" method="post">
                        <h1>Registrarse</h1>
                        <input class="inputLogin" type="text" name="nombre" id="nombre" placeholder="Nombre" required/><br>
                        <input class="inputLogin" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required/><br>
                        <input class="inputLogin" type="email" name="correoReg" id="correoReg" placeholder="Correo" required onblur="validarCorreo();"/><br>
                        <input class="inputLogin" type="password" name="passwordReg" id="passwordReg" placeholder="Contraseña" required/><br>
                        <input class="botonContacto" id="registrar" type="submit" onclick="registrarse(); return false;" value="Registrarse"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include 'footer.php'; ?>