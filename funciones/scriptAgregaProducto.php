<?php
    require "./conecta7.php";
    $con = conecta();

    $idCliente = $_REQUEST['idC'];
    $id = $_REQUEST['id'];
    $costo = $_REQUEST['costo'];
    $cantidad = $_REQUEST['cantidad'];

    // Consulta
    $consultaPedido = "SELECT COUNT(*) AS 'pedidoAbierto' FROM pedidos WHERE usuario = '$idCliente' AND status = 0";
    $result = $con->query($consultaPedido);
    $row = $result->fetch_array();
    if($row['pedidoAbierto'] == 0){
        $nuevoPedido = "INSERT INTO pedidos (fecha, usuario) VALUES (CURDATE(), $idCliente)";
        $res = $con->query($nuevoPedido);
        
        $agregaProducto = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) 
            VALUES ((SELECT id FROM pedidos WHERE usuario = $idCliente AND status = 0),
            $id, $cantidad, $costo)";
        $res2 = $con->query($agregaProducto);
    } else {

    }

    header("Location: ../carrito01.php");
?>