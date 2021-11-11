<?php
require '../logica/conexion.php';

if(isset($_POST['submit'])){
    session_start();
    $_SESSION['ustemp']=addslashes($_POST['0']);
    $_SESSION['patemp']=addslashes($_POST['1']);
    $_SESSION['cotemp']=addslashes($_POST['2']);
    $_SESSION['vetemp']=rand(10000, 99999);
    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $contenido="<html><body style='color: black;'><h1>Gracias por registrarse en Cafe Rsis</h1>\n<h3>Como ultimo paso es necesario que active su cuenta con el siguiente codigo</h3>\n<h3>Codigo de verificacion: ".$_SESSION['vetemp']."</h3></body></html>";

    $sql = "INSERT INTO pregistro (correo,codigo,usuario,contra) VALUES('$_SESSION[cotemp]','$_SESSION[vetemp]','$_SESSION[ustemp]','$_SESSION[cotemp]') ";
    if(mail($_SESSION['cotemp'],"Numero de Verificacion Cuenta",$contenido,$cabeceras)){
        $_SESSION['staco']=0;
        $conn->query($sql);
        header("Location:../usuarios/p_verificacion.php");
    }else{
        $_SESSION['staco']=1;
        header("Location:../usuarios/registro.php");
    }
}
?>
