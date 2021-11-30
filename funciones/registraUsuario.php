<?php
    require "./conecta7.php";
    $con = conecta();

    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $correo = $_REQUEST['correoReg'];
    $password = $_REQUEST['passwordReg'];
    $passEnc = md5($password);

    $sql =  "INSERT INTO clientes
            (nombre, apellidos, correo, pass)
            VALUES ('$nombre', '$apellidos', '$correo', '$passEnc')";
    
    if($res = $con->query($sql)){
        $sql = "SELECT id FROM clientes
            WHERE correo = '$correo' AND pass = '$passEnc'";
        $res = $con->query($sql);  
        $row = $res->fetch_array();
        $idU = $row['id'];

        session_start();
        $_SESSION['idCliente'] = $idU;
        $_SESSION['nombreCliente'] = $nombre;
        $_SESSION['correoCliente'] = $correo;
        
        header("Location: ../index.php");
    }
?>