<?php
session_start();
require '../logica/conexion.php';
require '../logica/sql_functions.php';

function proceso_registro($conn,$total){
    $user = addslashes($_SESSION["ustemp"]);
    $clave = addslashes($_SESSION["patemp"]);
    $email = addslashes($_SESSION["cotemp"]);

    if($total > 0){
        echo'<script type="text/javascript">
                alert("El nombre de usuario ya existe");
                window.location.href="../usuarios/registro.php";
            </script>';
    }else{
        $sql = "INSERT INTO usuarios (username,password,email) VALUES ('$user','$clave','$email') ";
        mysqli_query($conn, $sql);
        session_destroy();
        echo'<script type="text/javascript">
                alert("Usuario registrado");
                window.location.href="../usuarios/login.php";
            </script>';
    }
}

if($_SESSION['vetemp'] == $_POST['c_v'])
{
    $data_u = addslashes($_SESSION["ustemp"]);
    $table = $_POST['table'];
    $data = $_POST['data'];
    $query = "SELECT COUNT(*) as total FROM $table where $data = '$data_u' ";
    proceso_registro($conn,total($conn,$query));
}else{
    header("Location:../usuarios/p_verificacion.php");
}

?>