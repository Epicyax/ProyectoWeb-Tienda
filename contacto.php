<?php include 'menu.php'; ?> 
<html>
    <head>
        <title>Contacto</title>
    </head>
    <body class="main">
        <div class="wrap">
            <div class="contenedor contacto">
                <form name="contacto" method="post">
                    <h1>Contáctanos</h1>    
                    <input class="inputContacto" type="text" name="nombre" id="nombre" placeholder="Nombre" required/><br>
                    <input class="inputContacto" type="text" name="correo" id="correo" placeholder="Correo" required/><br>
                    <textarea style="font-family:arial;" class="inputContacto" name="comentarios" id="comentarios" placeholder="Comentarios" rows="12" required></textarea><br>
                    <input class="botonContacto" id="enviar" type="submit" onclick="valida(); return false;" value="Enviar"/>
                </form>
            </div>
        </div>
    </body>
</html>
<?php include 'footer.php'; ?>