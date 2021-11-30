<?php
    $asunto = $_REQUEST['asunto'];
    $correo = $_REQUEST['correo'];
    $comentarios = $_REQUEST['comentarios'];
    $from = 'From:super.tienda.web@gmail.com';

    if (mail($correo, $asunto, $comentarios, $from))
    {
        echo 1;
    } else {
        echo 0;
    }
?>