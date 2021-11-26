<?php include 'menu.php'; ?>
<html>
    <head>
        <title></title>
        <script>
            function agregarProducto(id){
                document.producto.method = 'post';
                document.producto.action = './funciones/scriptAgregaProducto';
                document.producto.submit();
            }

            function verProducto(id){
                document.productosRel.method = 'post';
                document.productosRel.action = './productos_detalle.php?id='+id;
                document.productosRel.submit();
            }
        </script>
    </head>
    <body class="main">
        <div class="wrap" style="background-color: rgb(171, 186, 192); border-radius: 8px;">
            <?php
                $con = conecta();
                $id = $_GET['id'];
                $sql = "SELECT * FROM productos WHERE id = $id";
                $res = $con->query($sql);
                $row = $res->fetch_array();

                $nombre = $row['nombre'];
                $codigo = $row['codigo'];
                $descripcion = $row['descripcion'];
                $costo = $row['costo'];
                $stock = $row['stock'];
                $archivo = $row['archivo'];
            ?>
            <div class="contenedorProducto" style="float: left">
                <div class="contenedorProducto">
                    <div>
                        <img src="../Proyecto_backend/archivos/<?php echo $archivo;?>" class="imagenProducto">
                    </div>
                </div>
                <div class="contenedorProducto">
                    <div><form name="producto">
                        <input type="number" name="idC" value="<?php echo $idCliente;?>" hidden>
                        <input type="number" name="id" value="<?php echo $id;?>" hidden>
                        <input type="number" name="costo" value="<?php echo $costo;?>" hidden>
                        <h1><?php echo $nombre;?></h1>
                        <p><b>Código:</b> <?php echo $codigo;?></p>
                        <p><b>Precio:</b> <?php echo number_format($costo, 2)?></p>
                        <p><b>Descrición del producto: </b><?php echo $descripcion;?></p>
                        <p><b>En stock: </b><?php echo $stock;?></p>
                        <select id="cantidad" name="cantidad" class="selectAgregar">
                            <option value="1" selected>1</option>
                            <?php
                                for($contador=2; $contador <= $stock; $contador++){
                                    echo '<option value='.$contador.'>'.$contador.'</option>';
                                }
                            ?>
                        </select>
                        <input type="submit" value="Agregar" class="btnAgregar" onclick="agregarProducto(<?php echo $id; ?>);return false;" <?php if($correoCliente == "") {?>disabled<?php }?>>
                    </div></form>
                </div>
            </div>
        </div>
        <div class="banner">
            <h2>Productos que podrían interesarle</h2>
        </div>
        <div class="wrap">
            <div class="productosRelacionados">
                <form name="productosRel">
                <?php
                    $sql2 = "SELECT * FROM productos WHERE eliminado = 0 AND status = 1 AND stock > 0 AND id <> $id ORDER BY rand() LIMIT 3";
                    $res2 = $con->query($sql2);
    
                    while ($row2 = $res2->fetch_array()) {
                        $idR = $row2["id"];
                        $nombre = $row2["nombre"];
                        $codigo = $row2["codigo"];
                        $costo = $row2["costo"];
                        $stock = $row2["stock"];
                        $archivo = $row2["archivo"];
                ?>
                    <div class="productoRelacionado" onclick="verProducto(<?php echo $idR;?>);">
                        <div>
                            <img class="productoHomeImagen" src="../Proyecto_backend/archivos/<?php echo $archivo ?>" alt="<?php echo $nombre;?>">
                        </div>
                        <div class="nombreHome">
                            <?php echo $nombre; ?>
                        </div><br>
                        <?php echo number_format($costo, 2); ?><br>
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