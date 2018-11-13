#!/usr/bin/php
<?php
include("phpagi/phpagi.php");
require_once('nusoap.php');
ob_implicit_flush(false);
set_time_limit(300);
error_reporting(E_ALL);
$agi = new AGI();
$agi->exec('Read', 'idp,IngreseIdProducto,3,,3,5');
$idprod = $agi->get_variable(idp);
$id=$idprod['data'];
$cliente = new nusoap_client('http://127.0.0.1/ws/servidor.php');
$resultado = $cliente->call('funcion', array('id' => $id));
$agi->stream_file('ElPrecioDelArticuloEsDe', '#');
$agi->say_number($resultado['precio']);
$agi->stream_file('and', '#');
$agi->stream_file('ElNumeroDeExistenciasEsDe', '#');
$agi->say_number($resultado['existencias']);
exit(0);
?>