<?php
require_once('nusoap.php');
$cliente = new nusoap_client('http://127.0.0.1/ws/servidor.php');
$resultado = $cliente->call('funcion', array('id' => 1));
echo("Precio: ".$resultado['precio']."\n");
echo("Existencias: ".$resultado['existencias']."\n");
?>