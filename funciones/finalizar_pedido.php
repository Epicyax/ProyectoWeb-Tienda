<?php
    require "./conecta7.php";
    $con = conecta();

    $idCliente = $_REQUEST['idC'];

    $flag = 0;

    $sql = "UPDATE pedidos SET status = 1 WHERE usuario = $idCliente AND status = 0";

    if($res = $con->query($sql)){
        $flag = 1;
    }
    
    echo $flag;
?>