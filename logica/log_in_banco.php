<?php
function log_in_bank($email,$pass){
    $datos_post = http_build_query(
        array(
            'email' => $email,
            'clave' => $pass
        )
    );
    $opciones = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $datos_post
        )
    );
    $contexto = stream_context_create($opciones);
    $resultado = file_get_contents('https://api.aureo.tech/api/usuario/iniciarSesion', false, $contexto);
    $datos = json_decode($resultado, true);
    $token = $datos['data']['token'];
    return $token;
}
?>