<?php include 'menu.php';?>
<html>
  <head>
    <title>Carrito</title>
    <script>
        function volver(){
            location.href="./index.php";
        }
    </script>
  </head>
  <body class="main">
        <div class="wrap">
                <div class="exito">
                    <h1>Compra realizada con éxito</h1>
                    <h3>Puede regresar a la página principal</h2>
                    <input type="button" class="btnContinuar" value="Ir al inicio" onclick="volver();">
                </div>
        </div>
  </body>
</html>
<?php include 'footer.php';?>