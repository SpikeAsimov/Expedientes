<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
@include('conexion.php');

@$cantidad = $_POST['cantidad'];
@$Numero = $_POST['nroOrden'];

for ($i = 1; $i < $cantidad; $i++){


    $SQL = "INSERT INTO `ordenprovision`(`numero`) VALUES ('$Numero')";

    $conexion->query($SQL) or die ("Error en $SQL ".mysqli_error());

    $Numero ++;

}


$datosJson = '[{"valido":"validate"}]';


echo $datosJson;
