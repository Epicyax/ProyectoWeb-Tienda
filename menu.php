<?php
session_start();
error_reporting(0);
$idCliente = $_SESSION['idCliente'];
$nombreCliente = $_SESSION['nombreCliente'];
$correoCliente = $_SESSION['correoCliente'];

require "./funciones/conecta7.php";
$con = conecta();
if($idCliente != ""){
    $totalArt = "SELECT SUM(cantidad) AS articulos FROM pedidos_productos 
                WHERE id_pedido = (SELECT id FROM pedidos WHERE usuario = $idCliente AND status = 0)";
    $r = $con->query($totalArt);
    $rw = $r->fetch_array();
    $numCarrito = $rw['articulos'];
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/estilos.css" />
        <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            function seleccionMenu(id) {
                document.getElementById("opcion" + id).style.backgroundColor = "rgba(0, 29, 37, 0.657)";
            }

            function deseleccionMenu(id) {
                document.getElementById("opcion" + id).style.backgroundColor = "rgb(0, 20, 26)";
            }
        </script>
    </head>

    <body>
        <div id="wrapMenu">
            <div id="contenedorMenu">
                <div id="menu">
                    <a href="./index.php" class="menuLink">
                        <div id="opcion1" class="opcionMenu" OnMouseEnter="seleccionMenu(1)" OnMouseLeave="deseleccionMenu(1)">Home</div>
                    </a>
                    <a href="./productos.php" class="menuLink">
                        <div id="opcion2" class="opcionMenu" OnMouseEnter="seleccionMenu(2)" OnMouseLeave="deseleccionMenu(2)">Productos</div>
                    </a>
                    <a href="./contacto.php" class="menuLink">
                        <div id="opcion3" class="opcionMenu" OnMouseEnter="seleccionMenu(3)" OnMouseLeave="deseleccionMenu(3)">Contacto</div>
                    </a>
                    <?php if ($correoCliente == "") { ?>
                        <a href="./login.php" class="menuLink">
                            <div id="opcion5" class="opcionMenu" OnMouseEnter="seleccionMenu(5)" OnMouseLeave="deseleccionMenu(5)">Iniciar sesión</div>
                        </a>
                    <?php } else { ?>
                        <a href="./carrito01.php" class="menuLink">
                            <div id="opcion4" class="opcionMenu" OnMouseEnter="seleccionMenu(4)" OnMouseLeave="deseleccionMenu(4)">Carrito(<?php echo $numCarrito ?>)</div>
                        </a>
                        <a href="./funciones/cerrar_sesion.php" class="menuLink">
                            <div id="opcion5" class="opcionMenu" OnMouseEnter="seleccionMenu(5)" OnMouseLeave="deseleccionMenu(5)">Cerrar sesión</div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>