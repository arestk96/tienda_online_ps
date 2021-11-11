<!DOCTYPE html>
<html lang="en">
<head id="cabeza">
    <?php
    echo '
    <script src="../js/head_content.js" type="text/javascript"></script>
    <script src="../js/body_content.js" type="text/javascript"></script>
    <script>
        head("Login");
    </script>';
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body id="test">
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
    .margen
    {
      padding: 5% 2% 5% 2%;
    }
    body{color: black;}
    </style>
    <div class="container-fluid fondo margen">
      <div class="row">
        <div class="col">
          <h2>Biembenido a café Rsis</h2>
        </div>
        <div class="col esquinas_redondeadas">
          <center>
            <h1>Iniciar Sesion</h1><hr>
                <form  method="POST" name="form-work" action="../logica/log_in.php">

                          <div class="form-group">
                            <div class="col-md-6">
                              <label class="control-label">Usuario</label>
                              <input type="text" name="usuario" placeholder="Digite su Usuario" class="form-control" maxlength="15" required>
                              </div>
                            </div>
                          <div class="form-group">
                              <div class="col-md-6">
                                <label class="control-label">Contraseña</label>
                                <input type="password" name="clave" placeholder="Digite Contraseña" class="form-control" maxlength="15" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block info" style="width: 50%;" >Iniciar Sesion</button>
                              </div>
                            </div>

                      </form>
                      <p>¿Que? ¡No tienes cuenta! </p>
                      <a class="btn btn-primary btn-lg btn-block info" style="width: 48.7%;" href="../usuarios/registro.php">Registrate</a>
                      <br><br>
              </center>
        </div>
      </div>
    </div>
   <?php
    echo '
    <script>
        body("Granos Campos ",1);
    </script>';
    ?>
</body>
</html>
