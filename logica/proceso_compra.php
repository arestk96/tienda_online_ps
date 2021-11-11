<?php
require '../logica/conexion.php';
require '../logica/sesion_iniciada.php';
require '../logica/sql_functions.php';
require '../logica/log_in_banco.php';
require '../logica/proceso_compra_banco.php';

if($_POST){
    $time = time()-18170;
    $fecha = date("Y-m-d H:i:s", $time);
    $productos = consulta("SELECT * FROM productos WHERE id = '$_POST[id]' ");
    if($productos[0]['existencias'] >= $_POST['cantidad'] && $_POST['cantidad'] != 0){
        $importe = (float)$_POST['cantidad'] * (float)$productos[0]['precio'];
        $recibo = array(
            "id_producto" => $_POST['id'],
            "fecha" => $fecha,
            "id_usuario" => $_SESSION['id'],
            "nomt" => $_POST['emac'],
            "numt" => $_POST['cn'],
            "cu" => $productos[0]['precio'],
            "importe" => $importe,
            "cantidad" => $_POST['cantidad'],
        );
        $concepto = $productos[0]['nombre'];
        $token = log_in_bank($_POST['emac'],$_POST['pwd']);
        if(isset($token) == NULL){
            echo'<script type="text/javascript">
                alert("Error datos usuario: email y/o contraseña");
                window.location.href="../productos/productos.php";
                </script>';
        }
        $estado = compra($_POST['cn'],$concepto,$importe,$token);

        if($estado == 'true'){
            $sql = "INSERT INTO ventas (id_producto,cantidad,id_usuario,fecha,importe,nt,cn)
        VALUES('$recibo[id_producto]','$recibo[cantidad]','$recibo[id_usuario]','$recibo[fecha]','$recibo[importe]','$recibo[nomt]','$recibo[numt]') ";

        $exis = (float)$productos[0]['existencias'];
        $ca = (float)$_POST['cantidad'];
        $nnn = $exis - $ca;

        $sql2 = "UPDATE productos SET existencias='$nnn' WHERE id = '$_POST[id]'";

        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
            $time_final = time()-18170;
            $fecha_final = date("Y-m-d H:i:s", $time_final);
            $resp = $time_final - $time;

            $conn->query("INSERT INTO log  (fecha, tipo, usuario, inicio_fecha, respuesta)
            VALUES('$recibo[fecha]','Transaccion Compra','$_SESSION[id]','$fecha_final','$resp')");

            echo'<script type="text/javascript">
                alert("Compra Satisfactoria");
                window.location.href="../productos/productos.php";
                </script>';

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo'<script type="text/javascript">
                alert("Error SQL");
                window.location.href="../productos/productos.php";
                </script>';
            }
        }else{
            echo'<script type="text/javascript">
                alert("Error datos numero de cuenta y/o saldo insuficiente");
                window.location.href="../productos/productos.php";
                </script>';
        }
        //mysqli_query($conn, $sql);
    }else{
        echo'<script type="text/javascript">
                alert("Error: Excede numero de existencia o existencias acabadas");
                window.location.href="../productos/productos.php";
                </script>';
    }

    #header( "refresh:3; url=../recibo.php" );

    /*foreach ($recibo as $value) {
        echo "$value <br>";
    }*/
}
?>
