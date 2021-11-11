<?php
    session_start();
    require '../logica/conexion.php';
    require '../logica/sql_functions.php';

    if($_POST){
        $user = addslashes($_POST['usuario']);
        $clave = addslashes($_POST['clave']);
        $time = time()-18170;
        $fecha = date("Y-m-d H:i:s", $time);
        $query = "SELECT COUNT(*) as total FROM usuarios where username = '$user' and password = '$clave' ";

        if(total($conn,$query)>0){
            $query = "SELECT * FROM usuarios where username = '$user' and password = '$clave' ";
            $b = consulta($query);
            $_SESSION['username'] = $user;
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $b[0]['id'];

            $time_final = time()-18170;
            $fecha_final = date("Y-m-d H:i:s", $time_final);
            $resp = $time_final - $time;

            $conn->query("INSERT INTO log  (fecha, tipo, usuario, inicio_fecha, respuesta)
            VALUES('$fecha','Inicio de Sesion','$_SESSION[id]','$fecha_final','$resp')");


            echo'<script type="text/javascript">
                alert("Conectado Satisfactoriamente");
                window.location.href="../productos/productos.php";
                </script>';
        }else {
            echo'<script type="text/javascript">
                alert("Datos Incorrectos");
                window.location.href="../usuarios/login.php";
                </script>';
        }
    }
?>
