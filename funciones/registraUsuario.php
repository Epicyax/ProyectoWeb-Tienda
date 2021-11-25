<?php
    require "./conecta7.php";
    $con = conecta();

    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $correo = $_REQUEST['correoReg'];
    $password = $_REQUEST['passwordReg'];
    $passEnc = md5($password);

    $sql =  "INSERT INTO clientes
            (nombre, apellidos, correo, password)
            VALUES ('$nombre', '$apellidos', '$correo', '$passEnc')";
    
    $res = $con->query($sql);

    header("Location: ../index.php");
?>