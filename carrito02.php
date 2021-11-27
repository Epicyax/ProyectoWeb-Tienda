<?php include 'menu.php';?>
<html>
  <head>
    <title>Carrito</title>
    <script>
        function finalizarPedido(id){
            $.ajax({
                url:        './funciones/finalizar_pedido.php?idC='+id,
                type:       'post',
                success:    function(res){
                    if (res == 1){
                        location.href="./exito_compra.php";
                    } else {
                        alert("Falla");
                    }
                }, error: function(){
                    alert('Error: Archivo no encontrado');
                }
            });  
        }
    </script>
  </head>
  <body class="main">
        <div class="wrap">
            <div class="contenido">
                <form name="pedido">
                <input type="button" value="Regresar" class="btnAgregar" onclick="location.href='./carrito01.php'" style="float: right;">
                <h1>Carrito</h1>
                <div class="filaInfoCarrito headerCarrito">
                    <div class="infoCarrito"><b>Producto</b></div>
                    <div class="infoCarrito"><b>Cantidad</b></div>
                    <div class="infoCarrito"><b>Costo unitario</b></div>
                    <div class="infoCarrito"><b>Subtotal</b></div>
                </div>
                <?php
                    $sql = "SELECT  PR.nombre, PR.stock, PE.cantidad, PE.precio, PE.id_producto 
                        FROM productos PR, pedidos_productos PE
                        WHERE PE.id_producto = PR.id AND 
                        id_pedido = (SELECT id FROM pedidos WHERE usuario = $idCliente AND status = 0)";
                    $res = $con->query($sql);
                    $total = 0;
                    while($row = $res->fetch_array()){
                        $nombre = $row['nombre'];
                        $cantidad = $row['cantidad'];
                        $precio = $row['precio'];
                        $id = $row['id_producto'];
                        $stock = $row['stock'];
                        $total = $total + ($precio * $cantidad);
                ?>
                    <div class="filaInfoCarrito" id="fila<?php echo $id;?>">
                        <div class="infoCarrito"><?php echo $nombre; ?></div>
                        <div class="infoCarrito"><?php echo $cantidad; ?></div>
                        <div class="infoCarrito">$<?php echo number_format($precio, 2); ?></div>
                        <div class="infoCarrito">$<?php echo number_format($precio*$cantidad, 2);?></div>
                    </div>
                <?php
                    }
                ?>
                <div class="filaInfoCarrito footerCarrito">
                    <div class="infoCarrito"></div>
                    <div class="infoCarrito"></div>
                    <div class="infoCarrito"><b>Total</b></div>
                    <div class="infoCarrito">$<?php echo number_format($total, 2);?></div>
                </div>
                <input id="idP" type="number" value="<?php echo $idCliente ?>" hidden>
                <div class="filaInfoCarrito filaContinuar">
                    <div class="infoCarrito"></div><div class="infoCarrito"></div><div class="infoCarrito"></div><div class="infoCarrito"></div>
                    <input type="submit" value="Finalizar" class="btnContinuar" onclick="finalizarPedido(<?php echo $idCliente; ?>); return false;">
                </div>
                </form>
            </div>
        </div>
  </body>
</html>
<?php include 'footer.php';?>