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
    <div id="wrapFooter">
        <div id="contenedorFooter">
            <div id="footer">
                <a href="./index.php" class="footerLink">
                    <div id="" class="opcionFooter">supertienda.com</div>
                </a>
                <div class="opcionFooter" style="height: 30px;">|</div>
                <a href="" class="footerLink">
                    <div id="opcion2" class="opcionFooter">Todos los derechos reservados</div>
                </a>
                <div class="opcionFooter" style="height: 30px;">|</div>
                <a href="" class="footerLink">
                    <div id="opcion3" class="opcionFooter">Política de privacidad</div>
                </a>
                <div class="opcionFooter" style="height: 30px;">|</div>
                <a href="" class="footerLink">
                    <div id="opcion4" class="opcionFooter">Términos y condiciones</div>
                </a>
                <div class="opcionFooter" style="height: 30px;">|</div>
                <a href="https://facebook.com" class="footerLink">
                    <div class="redes"><img src="./assets/facebook.png" style="width: auto; height: 34px"></div>
                </a>
                <a href="https://instagram.com" class="footerLink">
                    <div class="redes"><img src="./assets/instagram.png" style="width: auto; height: 40px"></div>
                </a>
                <a href="https://twitter.com" class="footerLink">
                    <div class="redes"><img src="./assets/twitter.png" style="width: auto; height: 34px"></div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>