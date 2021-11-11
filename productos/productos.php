<!DOCTYPE html>
<html lang="en">
<head id="cabeza">
    <?php
        echo '
        <script src="../js/head_content.js" type="text/javascript"></script>
        <script src="../js/body_content.js" type="text/javascript"></script>
        <script>
            head("Productos");
        </script>';
    ?>
</head>
<body id="test">
    <?php
    require '../logica/conexion.php';
    require '../logica/sql_functions.php';

    $time = time()-18170;
    $fecha = date("Y-m-d H:i:s", $time);

    $productos = consulta("SELECT * FROM productos");

    $time_final = time()-18170;
    $fecha_final = date("Y-m-d H:i:s", $time_final);
    $resp = $time_final - $time;

    $conn->query("INSERT INTO log  (fecha, tipo, usuario, inicio_fecha, respuesta)
            VALUES('$fecha','Consulta de Productos','$_SESSION[id]','$fecha_final','$resp')");
    ?>

<div class="content-fluid">
  <h1>Productos</h1>
    <section id="main-content" style="font-weight: 400;">
      <style media="screen">
        body{background: white;}
      </style>

        <!--Articulos-->
        <article>

                <div class="produc">
                    <div class="row center-xs">
                        <!--Productos-->
                        <?php
                        for($i=2;$i<sizeof($productos);$i++){
                            echo '
                                <div class"row">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product">
                                    <div class="card">
                                        <img src="'.$productos[$i]['img_dir'].'" alt="Feels Bad">
                                        <h3>'.$productos[$i]['nombre'].'</h3>
                                        <p>$ '.$productos[$i]['precio'].' </p>
                                        <a href="../productos/vista_comprar.php?producto='.$productos[$i]['id'].'" class="button">Comprar</a>
                                    </div>
                                </div>
                                </div>
                                ';
                        }
                        ?>
                         <!--Productos End-->
                    </div>
                </div>


        </article>	<!-- / article -->

    </section><!-- / #main-content -->
</div>
    <?php
        echo '
        <script>
            body("Cafe Rsis ",0);
        </script>';
    ?>
</body>
</html>
