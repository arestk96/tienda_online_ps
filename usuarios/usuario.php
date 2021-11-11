<?php
require '../logica/sesion_iniciada.php';
?>

<!DOCTYPE html>
<html lang="en">
<head id="cabeza">
    <?php
    echo '
    <script src="../js/head_content.js" type="text/javascript"></script>
    <script src="../js/body_content.js" type="text/javascript"></script>
    <script>
        head("Usuario");
    </script>';
    ?>
</head>
<body id="test">

    <h1>Usuario</h1>

    <section style="font-weight: 400;">

        <!--Articulos-->
        <article>
            <div class="content">
                <div class="productos" style="text-align: center;">
                    <?php
                    echo '
                    <style>
                      .h-100{height: 300px;}
                    </style>
                    <section id="main-content" style="font-weight: 400;">
                    <div class="h-100 row">

                            <div class="col-md-4">
                              <a href="../usuarios/usuario.php" class="a">Nombre de usuario: ',$_SESSION['username'],'</a>
                            </div>
                            <div class="col-md-4">
                              <a href="../usuarios/modificar_clave.php" class="a">Modificar contraseña</a>
                            </div>
                            <div class="col-md-4">
                              <a href="../usuarios/log.php" class="a">Log</a>
                              <br>
                              <br>
                              <a href="../logica/log_out.php" class="a">Salir</a>
                            </div>

                    </div>
                        ';
                    ?>
                </div>
            </div>

        </article>	<!-- / article -->

    </section><!-- / #main-content -->

    <?php
    echo '
    <script>
        body("Granos Campos ",1);
    </script>';
    ?>
</body>
</html>
