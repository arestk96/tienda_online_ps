<?php
require '../logica/conexion.php';

$sql = "UPDATE productos SET existencias= 100";

if($conn->query($sql) === TRUE){
    $time = time()-28800;
    $fecha = date("Y-m-d H:i:s", $time);
    $conn->query("INSERT INTO log  (fecha, tipo, usuario)
    VALUES('$fecha','Restablecer Stock','0')");
    echo "Hecho";
}else{
    echo "Ah Ocurrido un Error";
}

?>
