<?php
require '../logica/sesion_iniciada.php';
require '../logica/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head id="cabeza">
    <!--Flex Box Grid-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" />
    <link rel="stylesheet" href="../css/pop_window.css" type="text/css" />
    <?php
        require '../logica/sql_functions.php';
        $ch = $_GET['producto'];

        $time = time()-18170;
        $fecha = date("Y-m-d H:i:s", $time);

        $productos = consulta("SELECT * FROM productos WHERE id=$ch");

        $time_final = time()-18170;
        $fecha_final = date("Y-m-d H:i:s", $time_final);
        $resp = $time_final - $time;

        $conn->query("INSERT INTO log  (fecha, tipo, usuario, inicio_fecha, respuesta)
            VALUES('$fecha','Consulta de producto detallada','$_SESSION[id]','$fecha_final','$resp')");

        echo '
        <script src="../js/head_content.js" type="text/javascript"></script>
        <script src="../js/body_content.js" type="text/javascript"></script>

        <script>
        function ver_stock(id,n_id){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById(n_id).innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../logica/ajax_consulta.php?producto="+id, true);
            xhttp.send();
        }
        </script>

        <script>
            head("'.$productos[0]['nombre'].'");
        </script>';
    ?>
</head>
<body id="test" onload="ver_stock(<?php echo $ch ?>, 'stock')">

    <section id="main-content" style="font-weight: 400;">

        <!--Articulos-->
        <article>
            <div class="container">
                <div class="row center-xs">
                    <?php
                    echo '
                    <div class="col-xs-10 col-sm-6 col-md-6" style="margin-top: 14px;">
                        <div class="cardd">
                                <img src="'.$productos[0]['img_dir'].'" alt="Feels Bad" style="width: 350px; height: 350px; margin:8px 0 8px 0;">
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-6 col-md-6 col-lg-5">
                        <div class="cardd">
                            <h3 style="padding-top: 20px;">'.$productos[0]['nombre'].'</h3>
                            ';?>
                            <div>
                                <p onmouseover="ver_stock(<?php echo $ch ?>, 'stock')">Ver Stock: <span id="stock"></span> </p>
                            </div>
                            <?php
                            echo '
                            <p>Precio c/u $ '.$productos[0]['precio'].' </p>
                            <button id="myBtn" class="button">Comprar</button>
                        </div>
                    </div>';
                    ?>
                </div>
            </div>

        </article>	<!-- / article -->

    </section><!-- / #main-content -->

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <center>
            <form method="POST" class="formclass" style="width: 400px; color: #666; font-size: 18px;" action="../logica/proceso_compra.php">
                <?php
                echo '
                    <h3 style="padding-top: 20px;">'.$productos[0]['nombre'].'</h3>
                    Cantidad: <input type="number" id="myNumber" name="cantidad">
                    <p>Precio c/u $ '.$productos[0]['precio'].' </p>
                    <input type="hidden" name="precio" value='.$productos[0]['precio'].' />
                    <input type="hidden" name="id" value='.$productos[0]['id'].' />
                    ';
                ?>
                <div>
                    <p onmouseover="ver_stock(<?php echo $ch ?>, 'stockk')">Ver Stock: <span id="stockk">9</span> </p>
                </div>
                <hr>
                <label class="control-label">Banco</label><br>
                <select name="banco" style="width: 50%; margin-bottom: 20px;">
                    <option value="AureoBank">AureoBank</option>
                </select>
                <div style="display: flex;">
                    <i class="fa fa-user-o icon" aria-hidden="true" style=""></i>
                    <input class="entrada" type="email" placeholder="Enter your email" name="emac" required><br>
                </div>

                <div style="display: flex;">
                    <i class="fas fa-unlock icon" aria-hidden="true"></i>
                    <input class="entrada" type="password" name="pwd" placeholder="Enter your password" maxlength="20" required><br>
                </div>

                <div style="display: flex;">
                    <i class="fa fa-credit-card-alt icon" aria-hidden="true" style="padding-left: 5px"></i>
                    <input class="entrada" type="number" placeholder="Enter your account number" name="cn" pattern="\d*" min="1000000000000000" max="999999999999999999" required><br>
                </div>

                <br>
                <button type="submit" name="submit" class="button">Submit</button>
            </form>
        </center>
    </div>

    </div>

    <?php
        echo'
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
                ver_stock('.$ch.', "stockk");
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        ';
        echo '
        <script>
            body("Granos Campos ",1);
        </script>';
    ?>
</body>
</html>
