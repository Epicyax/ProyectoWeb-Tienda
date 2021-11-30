function ingresa(){
    var correo = document.ingreso.correoLog.value;
    var pass = document.ingreso.passwordLog.value;

    if(correo == "" || pass == ""){
        $('#err-msg-login').html('Faltan campos por llenar');
        $('#err-msg-login').show(400);
        setTimeout("$('#err-msg-login').hide(300);",4000);
    } else {
        setTimeout("$('#mensaje').html('');",0);
        $.ajax({
            url:        './funciones/validaUsuario.php?correo='+correo+'&pass='+pass,
            type:       'post',

            success:    function(res){
                if (res == 1){
                    window.location.href = 'index.php';
                } else {
                    $('#err-msg-login').html('Credenciales incorrectas');
                    $('#err-msg-login').show(400);
                    setTimeout("$('#err-msg-login').hide(300);",4000);
                }
            }, error: function(){
                alert('Error: Archivo no encontrado');
            }
        });
    }

}

function registrarse(){
    var nombre = document.registro.nombre.value;
    var apellidos = document.registro.apellidos.value;
    var correo = document.registro.correoReg.value;
    var pass = document.registro.passwordReg.value;

    if(nombre == "" || apellidos == "" || correo == "" || pass == ""){
        $('#err-msg-registro').html('Faltan campos por llenar');
        $('#err-msg-registro').show(400);
        setTimeout("$('#err-msg-registro').hide(300);",4000);
    } else {
        document.registro.method = 'post';
        document.registro.action = './funciones/registraUsuario.php';
        document.registro.submit();
    }
}

function validarCorreo(){
    var correo = $('#correoReg').val();
    $.ajax({
        type: 'post',
        url: './funciones/busca_correo.php?correo='+correo,
        success: function(flag){
            if(flag == 1){
                $('#err-msg-registro').html('El correo'+correo+' ya está registrado');
                $('#err-msg-registro').show(400);
                setTimeout("$('#err-msg-registro').hide(300);",4000);
                $('#registrar').attr('disabled',true);
            }
            else{
                $('#registrar').attr('disabled',false);
            }
        }, error: function(){
            alert('Error: Archivo no encontrado');
        }
    })
}