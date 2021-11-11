<!DOCTYPE html>
<html lang="en">
<head id="cabeza">
    <?php
    echo '
    <script src="../js/head_content.js" type="text/javascript"></script>
    <script src="../js/body_content.js" type="text/javascript"></script>

    <script>
        function v_name(n_id){
            var id = document.getElementById("nn").value;
            if(id.length == 0){
                document.getElementById(n_id).innerHTML = "";
                document.getElementById("c").value = document.getElementById(n_id).innerHTML;
                return;
            }else{
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(n_id).innerHTML = this.responseText;
                    document.getElementById("c").value = document.getElementById(n_id).innerHTML;
                    }
                };
                xhttp.open("GET", "../logica/ajax_name.php?name="+id, true);
                xhttp.send();
                document.getElementById("c").value = document.getElementById(n_id).innerHTML;
            }
        }
    </script>

    <script>
        function veri(){
            var x = document.getElementById("c").value;
            if(x == "False"){
                document.getElementById("nn").style.borderColor = "#DC143C";
                document.getElementById("nn").style.boxShadow = "0 0 0 0.2rem rgba(220,20,60,.25)";
            }else{
                document.getElementById("nn").style.borderColor = "";
                document.getElementById("nn").style.boxShadow = "";
            }
        }
    </script>

    <script>
        head("Registro");
    </script>';
    ?>

    <script>
    function sta(){
        var st = '<?php echo $_SESSION['staco'] ?>';
        if(st == 1){
            alert("Error al enviar el correo\nIntentelo mas tarde.");
            <?php $_SESSION['staco'] = 0; ?>
        }
    }
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body id="test" onload="sta();">
  <style>
  .btn-primary {
      color: #fff;
      background-color: #c59d5f;
      border-color: #4e3d22;
  }
  .btn-primary:hover{
      color: #fff;
      background-color: #4e3d22;
      border-color: #4e3d22;
  }
  </style>
                <br>
                <div class="container">
                 <center>
                    <h1>Registro Granos Campos</h1><hr>
                        <form  method="POST" name="form-work" action="../logica/correo_verificacion.php">
                                <fieldset>
                                  <div class="form-group">
                                    <div class="col-md-6">
                                      <label class="control-label">Usuario</label>
                                      <input id="nn" name="0" class="form-control" placeholder="Ingrese nombre de usuario" type="text" maxlength="15" onkeyup="v_name('vname');" onfocusout="veri();" required>
                                     </div>
                                    </div>
                                    <span style="font-size: 0; position: absolute; left: -999px;" id="vname" value="False"></span>
                                    <input style="font-size: 0; position: absolute; left: -999px;" id="c" value="" pattern="\bTrue\b" required>
                                  <div class="form-group">
                                      <div class="col-md-6">
                                        <label class="control-label">Contraseña</label>
                                        <input name="1" class="form-control" placeholder="Ingrese contraseña" type="password" maxlength="15" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-6">
                                        <label class="control-label">Email</label>
                                        <input name="2" class="form-control" placeholder="epoca@company.com" type="email" maxlength="40" required>
                                      </div>
                                    </div>
                                    <input type="hidden" name="table" value="usuarios">
                                    <input type="hidden" name="data" value="username">
                                    <div class="form-group">
                                      <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block info" style="width: 50%;" >Guardar</button>
                                      </div>
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
</body>
</html>
