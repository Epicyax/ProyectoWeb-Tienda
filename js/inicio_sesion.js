function ingresa(){
    var correo = document.ingreso.correoLog.value;
    var pass = document.ingreso.passwordLog.value;

    if(correo == "" || pass == ""){
        /*$('#mensaje').html('Error: Faltan campos por llenar');
        setTimeout("$('#mensaje').html('');",5000);*/
    } else {
        setTimeout("$('#mensaje').html('');",0);
        $.ajax({
            url:        './funciones/validaUsuario.php?correo='+correo+'&pass='+pass,
            type:       'post',

            success:    function(res){
                if (res == 1){
                    window.location.href = 'index.php';
                } else {
                    /*$('#mensaje').html('Credenciales incorrectas');
                    setTimeout("$('#mensaje').html('');",3000);*/
                    alert("Credenciales incorrectas");
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
        /*$('#mensaje').html('Error: Faltan campos por llenar');
        setTimeout("$('#mensaje').html('');",5000);*/
        alert("Faltan campos por llenar");
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