<?php

function compra($cn,$concepto,$total,$token){
    $datos_post = http_build_query(
        array(
            'clabeCuentaEmisora' => $cn,
            'concepto' => $concepto,
            'idBancoEmisor' => '1',
            'idBancoReceptor' => '1',
            'monto' => $total,
            'clabeCuentaReceptora' => '676727474568619419'
        )
    );
    $opciones = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Authorization: Bearer '.$token,
            'content' => $datos_post
        )
    );
    $contexto = stream_context_create($opciones);
    $resultado = file_get_contents('https://api.aureo.tech/api/transferir', false, $contexto);
    $datos = json_decode($resultado, true);
    $estado = $datos['data']['transferenciaAplicada'];
    if($estado == 'true'){
        echo 'True';
        return 'true';
    }else if($estado == 'false'){
        echo 'False';
        return 'false';
    }
}
?>
