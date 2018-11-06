<?php
require_once('nusoap.php');
$server = new nusoap_server();
$server->register('funcion');
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ?
$HTTP_RAW_POST_DATA : '';
$server->service(file_get_contents("php://input"));
function funcion($id){
$conexion = mysqli_connect('127.0.0.1','root','','inventario');
$query = "SELECT precio,existencias FROM productos WHERE id='".$id."'";
$result = mysqli_query($conexion,$query);
while($row=mysqli_fetch_array($result)){
$precio=$row["precio"];
$existencias=$row["existencias"];
}
mysqli_close($conexion);
return array('precio'=>$precio,'existencias'=>$existencias);
}
?>