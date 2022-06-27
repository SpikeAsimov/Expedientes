<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
@include('conexion.php');

$cantidad = $_POST['cantidad'];

//UltimoNro
$SQL_ultimo = "SELECT max(numero) + 1 as ultimo FROM ordenprovision";
$respuesta = $conexion->query($SQL_ultimo);
$row = $respuesta->fetch_assoc();
$resultado = $row['ultimo'];
@$Numero = $resultado;





//Crear orden
for ($i = 1; $i < $cantidad; $i++){

    $SQL = "INSERT INTO `ordenprovision`(`numero`) VALUES ('$Numero')";
    $conexion->query($SQL) or die ("Error en $SQL ".mysqli_error());

    $Numero ++;

}


$datosJson = "todo OK";


echo $datosJson;
