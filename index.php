<?php include 'menu.php'; ?>
<html>

<head>
    <title>Home</title>
</head>

<body class="main" style="background-color: rgb(195, 211, 218);">
    <?php
        require "./funciones/conecta7.php";
        $con = conecta();
        $sql = "SELECT * FROM banners WHERE eliminado = 0 AND status = 1 ORDER BY rand() LIMIT 1";
        $res = $con->query($sql);
        $row = $res->fetch_array();
        $imagen = $row["archivo"];
    ?>
    <div class="banner"><img src="../Proyecto_backend/archivos/<?php echo $imagen; ?>"></div>
    <div class="wrap">
        <div class="contenedor">
            <?php
                $con = conecta();
                $sql = "SELECT * FROM productos WHERE eliminado = 0 AND status = 1 AND stock > 0
                ORDER BY rand() LIMIT 6";
                $res = $con->query($sql);

                $cont = 0;
                while($row = $res->fetch_array()){
                    $id = $row["id"];
                    $nombre = $row["nombre"];
                    $codigo = $row["codigo"];
                    $costo = $row["costo"];
                    $stock = $row["stock"];
                    $archivo = $row["archivo"];
            ?>
                <div class="productoHome">
                    <div><img class="productoHomeImagen" src="../Proyecto_backend/archivos/<?php echo $archivo?>"></div>
                    <div class="nombreHome"><?php echo $nombre; ?></div><br>
                    <?php echo number_format($costo,2); ?><br>
                    <select id="producto_<?php echo $id; ?>" name="producto_<?php echo $id; ?>">
                        <option value="0">Selecciona</option>
                        <option value="1" selected>1</option>
                        <?php
                            for($contador=2; $contador <= $stock; $contador++){
                                echo '<option value='.$contador.'>'.$contador.'</option>';
                            }
                        ?>
                    </select>
                    <input onclick="agregar(<?php echo $id; ?>);return false;" type="submit" value="Agregar"><br>
                    <div id="mensaje_<?php echo $id; ?>" style="color:#FF0000; font-size:11px; height: 20px"></div>
                </div>
            <?php
                $cont++;
                /*if($cont >= 6)
                    break;*/
            }
            ?>
        </div>
    </div>
</body>

</html>
<?php include 'footer.php'; ?>