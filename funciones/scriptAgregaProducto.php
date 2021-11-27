<?php
    require "./conecta7.php";
    $con = conecta();

    $idCliente = $_REQUEST['idC'];
    $id = $_REQUEST['idP'];
    $costo = $_REQUEST['costo'];
    $cantidad = $_REQUEST['cantidad'];

    // Consulta si existe un pedido abierto del usuario
    $consultaPedido = "SELECT COUNT(*) AS 'pedidoAbierto' FROM pedidos WHERE usuario = '$idCliente' AND status = 0";
    $result = $con->query($consultaPedido);
    $row = $result->fetch_array();
    if($row['pedidoAbierto'] == 0){ // Si no hay pedido abierto
        // Genera un nuevo pedido
        $nuevoPedido = "INSERT INTO pedidos (fecha, usuario) VALUES (CURDATE(), $idCliente)";
        $res = $con->query($nuevoPedido);
        
        // Inserta el artículo
        $agregaProducto = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) 
            VALUES ((SELECT id FROM pedidos WHERE usuario = $idCliente AND status = 0),
            $id, $cantidad, $costo)";
        $res2 = $con->query($agregaProducto);
    } else { // Si hay pedido abierto
        // Verifica si ya hay un producto como el agregado en el pedido
        $articuloExiste = "SELECT cantidad FROM pedidos_productos WHERE id_producto = $id
            AND id_pedido = (SELECT id FROM pedidos WHERE usuario = $idCliente AND status = 0)";
        $res = $con->query($articuloExiste);
        $row = $res->fetch_array();
        if($row['cantidad'] > 0){ // Si ya hay un producto igual
            // Cantidad anterior + nueva cantidad
            $cantidad = $row['cantidad'] + $cantidad;
            // Actualiza la cantidad del producto
            $updateProducto = "UPDATE pedidos_productos SET cantidad = $cantidad WHERE
                id_producto = $id AND id_pedido = (SELECT id FROM pedidos WHERE usuario = $idCliente AND status = 0)";
            $res = $con->query($updateProducto);
        } else { // Si no hay un producto igual
            $agregaProducto = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) 
                VALUES ((SELECT id FROM pedidos WHERE usuario = $idCliente AND status = 0),
                $id, $cantidad, $costo)";
            $res = $con->query($agregaProducto);
        }

    }

    header("Location: ../carrito01.php");
?>