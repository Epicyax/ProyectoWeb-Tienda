<?php
    require "./conecta7.php";
    $con = conecta();

    $idP = $_REQUEST['idP'];
    $idC = $_REQUEST['idC'];
    $cant = $_REQUEST['cant'];

    $flag = 0;

    $sql = "UPDATE pedidos_productos SET cantidad = $cant WHERE id_producto = $idP 
        AND id_pedido = (SELECT id FROM pedidos WHERE usuario = $idC AND status = 0)";

    if($res = $con->query($sql)){
        $flag = 1;
    }
    
    echo $flag;
?>