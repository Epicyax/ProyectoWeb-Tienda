<?php
    session_start();
    require "./conecta7.php";
    $con = conecta();

    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    $pass = md5($pass);

    $sql = "SELECT * FROM clientes
            WHERE correo = '$correo' AND pass = '$pass'
            AND status = 1 AND eliminado = 0";

    $res = $con->query($sql);
    $num = $res->num_rows;

    if($num){
        $row = $res->fetch_array();
        $idU = $row['id'];
        $nombre = $row['nombre'];
        $correo = $row['correo'];
        $_SESSION['idCliente'] = $idU;
        $_SESSION['nombreCliente'] = $nombre;
        $_SESSION['correoCliente'] = $correo;
    }

    echo $num;
?>