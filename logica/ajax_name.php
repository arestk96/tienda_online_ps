<?php
require '../logica/conexion.php';

$nombre=$_GET['name'];
$sql = "SELECT * FROM usuarios WHERE username='$nombre'";
    
$result = mysqli_query($conn, $sql);
$iteraciones=0;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "False";
        $iteraciones++;
    }
} else {
    echo "True";
}
mysqli_close($conn);
?>