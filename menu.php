<?php
  /*session_start();
  $nombreUsuario = $_SESSION['nombre'];
  $correoUsuario = $_SESSION['correo'];*/
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css"/>
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
          <a href="./bienvenido.php" class="menuLink">
            <div id="opcion1" class="opcionMenu" OnMouseEnter="seleccionMenu(1)" OnMouseLeave="deseleccionMenu(1)">Home</div>
          </a>
          <a href="productos.php" class="menuLink">
            <div id="opcion2" class="opcionMenu" OnMouseEnter="seleccionMenu(2)" OnMouseLeave="deseleccionMenu(2)">Productos</div>
          </a>
          <a href="contacto.php" class="menuLink">
            <div id="opcion3" class="opcionMenu" OnMouseEnter="seleccionMenu(3)" OnMouseLeave="deseleccionMenu(3)">Contacto</div>
          </a>
          <a href="carrito.php" class="menuLink">
            <div id="opcion4" class="opcionMenu" OnMouseEnter="seleccionMenu(4)" OnMouseLeave="deseleccionMenu(4)">Carrito</div>
          </a>
        </div>
      </div>
    </div>
  </body>
</html>