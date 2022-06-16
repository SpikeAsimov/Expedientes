<?php header('Access-Control-Allow-Origin: *');

@include ('conexion.php');

$SQL = "SELECT max(numero) + 1 as ultimo FROM ordenprovision";

$respuesta = $conexion->query($SQL);

$row = $respuesta->fetch_assoc();

$resultado = $row['ultimo'];



echo $ultimo = str_pad($resultado, 8, '000-0000', STR_PAD_LEFT);



