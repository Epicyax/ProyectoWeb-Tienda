<?php include 'menu.php'; ?>
<html>
    <head>
        <title>Productos</title>
        <script>
            function agregarProducto(idC, idP, costo){
                var cant = $('#cantidad'+idP).val();
                document.productos.method = 'post';
                document.productos.action = './funciones/scriptAgregaProducto.php?idC='+idC+'&idP='+idP+'&costo='+costo+'&cantidad='+cant;
                document.productos.submit();
            }   

            function verProducto(id){
                document.productos.method = 'post';
                document.productos.action = './productos_detalle.php?id='+id;
                document.productos.submit();
            }
        </script>
    </head>

    <body class="main">
        <div class="wrap">
            <div class="contenedor">
                <form name="productos">
                <?php
                    $con = conecta();
                    $sql = "SELECT * FROM productos WHERE eliminado = 0 AND status = 1 ORDER BY stock DESC";
                    $res = $con->query($sql);

                    while($row = $res->fetch_array()){
                        $id = $row["id"];
                        $nombre = $row["nombre"];
                        $codigo = $row["codigo"];
                        $costo = $row["costo"];
                        $stock = $row["stock"];
                        $archivo = $row["archivo"];
                ?>
                    <div class="productoHome">
                        <input type="number" id="idP" name="idP" value="<?php echo $id;?>" disabled hidden>
                        <div><img class="productoHomeImagen" src="../Proyecto_backend/archivos/<?php echo $archivo?>" 
                        alt="<?php echo $nombre;?>" onclick="verProducto(<?php echo $id;?>);"></div>
                        <div class="nombreHome" onclick="verProducto(<?php echo $id;?>);" style="cursor: pointer;">
                            <?php echo $nombre; ?>
                        </div>
                        <?php echo number_format($costo,2); ?><br>
                        <select id="cantidad<?php echo $id; ?>" name="cantidad" class="selectAgregar" <?php if($stock == 0){?> disabled <?php } ?>>
                            <option value="1" selected>1</option>
                            <?php
                                for($contador=2; $contador <= $stock; $contador++){
                                    echo '<option value='.$contador.'>'.$contador.'</option>';
                                }
                            ?>
                        </select>
                        <input class="btnAgregar" type="button" value="Agregar" <?php if($correoCliente == "" || $stock == 0) {?>disabled<?php }?>
                        onclick="agregarProducto(<?php echo $idCliente; ?>, <?php echo $id; ?>, <?php echo $costo; ?>); return false;" ><br>
                        <?php if($stock == 0){
                            echo "Producto no disponible";
                        } ?>
                    </div>
                <?php
                }
                ?>
                </form>
            </div>
        </div>
    </body>
</html>
<?php include 'footer.php'; ?>