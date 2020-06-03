<?php

include_once 'autocompletarco.php';

$modelo = new Autocompletarco();

$texto = $_GET['ciudad-origen'];

$res = $modelo->buscar($texto);

echo json_encode($res);

?>