<?php include 'menu.php';?>
<html>
  <head>
    <title>Carrito</title>
    <script>
        function cambiaCantidad(idProducto, idCliente){
            var nuevaCant = $('#cantidad'+idProducto).val();
            $.ajax({
                url:        './funciones/actualiza_cantidad.php?idP='+idProducto+'&idC='+idCliente+'&cant='+nuevaCant,
                type:       'post',
                success:    function(res){
                    if (res == 1){
                        location.reload();
                    } else {
                        alert("Falla");
                    }
                }, error: function(){
                    alert('Error: Archivo no encontrado');
                }
            });            
        }

        function eliminarProducto(idProducto, idCliente){
            if(confirm("¿Seguro de que desea quitar este producto?")){
                $.ajax({
                    url:        './funciones/elimina_carrito.php?idP='+idProducto+'&idC='+idCliente,
                    type:       'post',

                    success:    function(res){
                        if (res == 1){
                            $('#fila'+idProducto).hide();
                            $('#mensaje').html('Producto eliminado con éxito');
                            $('#mensaje').addClass("good-msg");
                            $('#mensaje').show(400);
                            setTimeout("$('#mensaje').hide(300);",4000);
                        } else {
                            $('#mensaje').html('Error al eliminar');
                            $('#mensaje').addClass("err-msg");
                            $('#mensaje').show(400);
                            setTimeout("$('#mensaje').hide(300);",4000);
                        }
                    }, error: function(){
                        alert('Error: Archivo no encontrado');
                    }
                });
            }
        }
    </script>
  </head>
  <body class="main">
        <div class="wrap">
            <div class="contenido">
                <div id="mensaje" class="good-msg" hidden></div>
                <h1>Carrito</h1>
                <div class="filaInfoCarrito headerCarrito">
                    <div class="infoCarrito"><b>Producto</b></div>
                    <div class="infoCarrito"><b>Cantidad</b></div>
                    <div class="infoCarrito"><b>Costo unitario</b></div>
                    <div class="infoCarrito"><b>Subtotal</b></div>
                    <div class="infoCarrito"></div>
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
                        <div class="infoCarrito">
                            <select id="cantidad<?php echo $id;?>" name="cantidad" class="selectAgregar" onchange="cambiaCantidad(<?php echo $id;?>, <?php echo $idCliente;?>);">
                                <?php
                                    for($contador=1; $contador <= $stock; $contador++){
                                        if($contador == $cantidad)
                                            echo '<option value='.$contador.' selected>'.$contador.'</option>';
                                        else
                                            echo '<option value='.$contador.'>'.$contador.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="infoCarrito">$<?php echo number_format($precio, 2); ?></div>
                        <div class="infoCarrito">$<?php echo number_format($precio*$cantidad, 2);?></div>
                        <div class="infoCarrito">
                            <input type="button" value="Eliminar" class="btnAgregar" onclick="eliminarProducto(<?php echo $id;?>, <?php echo $idCliente;?>);">
                        </div>
                    </div>
                <?php
                    }
                ?>
                <div class="filaInfoCarrito footerCarrito">
                    <div class="infoCarrito"></div>
                    <div class="infoCarrito"></div>
                    <div class="infoCarrito"><b>Total</b></div>
                    <div class="infoCarrito">$<?php echo number_format($total, 2);?></div>
                    <div class="infoCarrito"></div>
                </div>
                <div class="filaInfoCarrito filaContinuar">
                    <div class="infoCarrito"></div><div class="infoCarrito"></div><div class="infoCarrito"></div><div class="infoCarrito"></div>
                    <input type="button" value="Continuar" class="btnContinuar" onclick="location.href='./carrito02.php'" <?php if($total==0){ ?>disabled<?php } ?>>
                </div>
            </div>
        </div>
  </body>
</html>
<?php include 'footer.php';?>