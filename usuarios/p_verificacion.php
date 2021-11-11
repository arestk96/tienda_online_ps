<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head id="cabeza">
    <?php
    echo '
    <script src="../js/head_content.js" type="text/javascript"></script>
    <script src="../js/body_content.js" type="text/javascript"></script>
    
    <script>
        head("Verificación");
    </script>';
    ?>
    
    <script>
    function vconf(){
        var someSession = '<?php echo $_SESSION["vetemp"]*3; ?>';
        var x = (document.getElementById("cv").value)*3;
        if(someSession == x){
            document.getElementById("cv").style.borderColor = "";
            document.getElementById("cv").style.boxShadow = "";
            document.getElementById("myform").submit();
        }else{
            document.getElementById("cv").style.borderColor = "#DC143C";
            document.getElementById("cv").style.boxShadow = "0 0 0 0.2rem rgba(220,20,60,.25)";
        }
    }
    </script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body id="test">
                <br>
                <div class="container">
                 <center>
                    <h1>Verificación Cuenta</h1><hr>
                        <form id="myform" method="POST" name="form-work" action="../logica/proceso_registro.php">
                                <fieldset>
                                  <div class="form-group">
                                    <div class="col-md-6">
                                      <label class="control-label">Numero de verificación</label>
                                      <input id="cv" name="c_v" class="form-control" placeholder="Ingrese numero de verificación" type="text" maxlength="5" required>
                                      </div>
                                    </div>
                                    <input type="hidden" name="table" value="usuarios">
                                    <input type="hidden" name="data" value="username">
                                    <div class="form-group">
                                      <div class="col-md-12">
                                        <input type="button" name="en_submit" class="btn btn-primary btn-lg btn-block info" style="width: 50%;" value="Guardar" onclick="vconf();">
                                      </div>
                                      <!--
                                      <br>
                                      <a style="color: #007bff; cursor: pointer;" onclick="">¿No recibiste el correo? Reenviar codigo de confirmación.</a>
                                      -->
                                    </div>     
                                </fieldset> 
                        </form>
                 </center>
              </div>
   <?php
    echo '
    <script>
        body("Granos Campos ",1);
    </script>';
    ?>
    <?php
    echo '
    <script type="text/javascript">
        function submitform()
        {
        document.forms["myform"].submit();
        alert("Value is sumitted");
        }
    </script>
    ';
    ?>
</body>
</html>