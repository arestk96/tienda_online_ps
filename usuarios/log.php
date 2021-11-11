<?php
require '../logica/sesion_iniciada.php';
require '../logica/conexion.php';
require '../logica/sql_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head id="cabeza">
    <?php
    echo '
    <script src="../js/head_content.js" type="text/javascript"></script>
    <script src="../js/body_content.js" type="text/javascript"></script>
    <script>
        head("Log");
    </script>';
    ?>
</head>
<body id="test">
    <?php
    echo '
    <section id="main-content" style="font-weight: 400;">
    <div class="h-100 row">

            <div class="col-md-4">
              <a href="../usuarios/usuario.php" class="a">Nombre de usuario: ',$_SESSION['username'],'</a>
            </div>
            <div class="col-md-4">
              <a href="../usuarios/modificar_clave.php" class="a">Modificar contraseña</a>
            </div>
            <div class="col-md-4">
              <a href="../logica/log_out.php" class="a">Salir</a>
            </div>

    </div>
        ';
    $log = consulta("SELECT * FROM log");
        echo '<div class="log">';
        for($i=0;$i < sizeof($log);$i++){
            echo '<p class="logp">'."Inicio de Transaccion: ".$log[$i]["fecha"]." Final de Transaccion: ".$log[$i]["inicio_fecha"]." Tiempo de Respuesta: ".$log[$i]["respuesta"]." Tipo: ".$log[$i]["tipo"]." ID Usuario: ".$log[$i]["usuario"]."<br></p>";
        }
        echo '</div>';

    echo '
    <script>
        body("Granos Campos ",1);
    </script>';
    ?>
</body>
</html>
