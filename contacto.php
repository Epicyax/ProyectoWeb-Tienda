<?php include 'menu.php'; ?> 
<html>
    <head>
        <title>Contacto</title>
        <script>
            function envia(){
                var nombre = document.contacto.nombre.value;
                var correo = document.contacto.correo.value;
                var comentarios = document.contacto.comentarios.value;
                var asunto = document.contacto.asunto.value;
                asunto = asunto + " <From: " + correo + ">"
                
                if(nombre == "" || correo == "" || comentarios == ""){
                    $('#mensaje').removeClass("good-msg");
                    $('#mensaje').html('Faltan campos por llenar');
                    $('#mensaje').addClass("err-msg");
                    $('#mensaje').show(400);
                    setTimeout("$('#mensaje').hide(300);",4000);
                } else {
                    setTimeout("$('#mensaje').html('');",0);
                    $.ajax({
                        url:        './funciones/contacto_envia.php?asunto='+asunto+'&correo='+correo+'&comentarios='+comentarios,
                        type:       'post',

                        success:    function(res){
                            if (res == 1){
                                $('#mensaje').removeClass("err-msg");
                                $('#mensaje').html('Correo enviado con éxito');
                                $('#mensaje').addClass("good-msg");
                                $('#mensaje').show(400);
                                setTimeout("$('#mensaje').hide(300);",4000);
                            } else {
                                $('#mensaje').removeClass("good-msg");
                                $('#mensaje').html('No se pudo enviar el correo');
                                $('#mensaje').addClass("err-msg");
                                $('#mensaje').show(400);
                                setTimeout("$('#mensaje').hide(300);",4000);
                            }
                        }, error: function(){
                            alert('Error: Archivo no encontrado');
                        }
                    });
                }

            }
        </script>
    </head>
    <body class="main">
        <div class="wrap">
            <div class="contenedor contacto">
                <form name="contacto" method="post">
                    <h1>Contáctanos</h1>
                    <div id="mensaje" hidden></div><br>
                    <div id="err-msg-login" class="err-msg" hidden></div>
                    <input class="inputContacto" type="email" name="correo" id="correo" placeholder="Correo" required/><br>
                    <input class="inputContacto" type="text" name="nombre" id="nombre" placeholder="Nombre" required/><br>
                    <input class="inputContacto" type="text" name="asunto" id="asunto" placeholder="Asunto" required/><br>
                    <textarea style="font-family:arial;" class="inputContacto" name="comentarios" id="comentarios" placeholder="Comentarios" rows="12" required></textarea><br>
                    
                    <input class="botonContacto" id="enviar" type="submit" onclick="envia(); return false;" value="Enviar"/>
                </form>
            </div>
        </div>
    </body>
</html>
<?php include 'footer.php'; ?>