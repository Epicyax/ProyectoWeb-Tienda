<?php
    require "./conecta7.php";
    $con = conecta();
    $correo = $_REQUEST['correo'];

    $flag = 0;
    $sql = "SELECT COUNT(*) AS 'encontrados' FROM clientes WHERE correo = '$correo'";
    
    $result = $con->query($sql);
    $row = $result->fetch_array();
    if($row['encontrados' > 0]){
        $flag = 1;
    }
    
    echo $flag;
?>
