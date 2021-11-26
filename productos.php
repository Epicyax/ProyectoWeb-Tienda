<?php include 'menu.php'; ?>
<html>
    <head>
        <title>Productos</title>
        <script>
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
                    require "./funciones/conecta7.php";
                    $con = conecta();
                    $sql = "SELECT * FROM productos WHERE eliminado = 0 AND status = 1 AND stock > 0 ORDER BY id";
                    // Hacer que los que no tienen stock aparezcan pero no se pueda agregar
                    $res = $con->query($sql);

                    $cont = 0;
                    while ($row = $res->fetch_array()) {
                        $id = $row["id"];
                        $nombre = $row["nombre"];
                        $codigo = $row["codigo"];
                        $costo = $row["costo"];
                        $stock = $row["stock"];
                        $archivo = $row["archivo"];
                ?>
                    <div class="productoHome">
                        <div>
                            <img class="productoHomeImagen" src="../Proyecto_backend/archivos/<?php echo $archivo ?>"
                            alt="<?php echo $nombre;?>" onclick="verProducto(<?php echo $id;?>);">
                        </div>
                        <div class="nombreHome"  onclick="verProducto(<?php echo $id;?>);" style="cursor: pointer;">
                            <?php echo $nombre; ?>
                        </div><br>
                        <?php echo number_format($costo, 2); ?><br>
                        <select id="producto_<?php echo $id; ?>" name="producto_<?php echo $id; ?>">
                            <option value="0">Selecciona</option>
                            <option value="1" selected>1</option>
                            <?php
                            for ($contador = 2; $contador <= $stock; $contador++) {
                                echo '<option value=' . $contador . '>' . $contador . '</option>';
                            }
                            ?>
                        </select>
                        <input onclick="agregar(<?php echo $id; ?>);return false;" type="submit" value="Agregar"><br>
                        <div id="mensaje_<?php echo $id; ?>" style="color:#FF0000; font-size:11px; height: 20px"></div>
                    </div>
                <?php
                    $cont++;
                }
                ?>
                </form>
            </div>
        </div>
    </body>
</html>
<?php include 'footer.php'; ?>