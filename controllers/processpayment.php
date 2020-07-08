<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="../resources/images/icon.png">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="../index.php"> Aerolinea</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="#">Detalles de la reservación <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
</nav>

<?php
    $idvuelo = $_POST['idvuelo'];
    $nombre_cliente = $_POST['nombre_cliente']; 
    $numero_tarjeta = $_POST['numero_tarjeta'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $codigo_cvc = $_POST['codigo_cvc'];
    $cantidad = $_POST['cantidad'];

    $num_infantes = $_POST['num_infantes'];
    $num_ninos = $_POST['num_ninos'];
    $num_adultos = $_POST['num_adultos'];
    $ciudad_origen = $_POST['ciudad_origen'];
    $ciudad_destino = $_POST['ciudad_destino'];
    $fecha_salida = $_POST['fecha_salida'];
    $tarifa = $_POST['tarifa'];
    $beneficios_tarifa = $_POST['beneficios_tarifa'];

    $params = array(
        "nombre_cliente" => $nombre_cliente,
        "num_tarjeta" => $numero_tarjeta,
        "fecha_vencimiento" => $fecha_vencimiento,
        "codigo_cvc" => $codigo_cvc,
        "cantidad" => $cantidad,
        );
    $params2 = array(
        "id_vuelo" => $idvuelo,
        "nombre_cliente" => $nombre_cliente,
        "num_tarjeta" => $numero_tarjeta,
        "fecha_vencimiento" => $fecha_vencimiento,
        "codigo_cvc" => $codigo_cvc,
        "cantidad" => $cantidad,
        );
        //conexion al sw
        try
        {
            $client = new SoapClient("http://3.87.203.171:8080/banco.wsdl");
            $response = $client->__soapCall("RealizarCobro", array($params));
            
            /*echo "<div class='card text-white bg-success w-50' align='center' style='left:25%; top:5%;'>
                <div class='card-header'>
                    Detalles de la transacción
                </div>
                <div class='card-body'>
                    <blockquote class='blockquote mb-0'>
                    <p>{$response->{'pago_realizado'}}</p>
                </blockquote>
                </div>
            </div>";*/
            
            $client2 = new SoapClient("http://localhost:8080/ws/aerolinea.wsdl");
            $response = $client2->__soapCall("CreateFlightReservation", array($params2));
            //echo "<h1 style='color:#ffffff';>{$response->{'datos'}}</h1>";
            
            echo "<div class='card text-white bg-primary mb-3 w-50' style='left:25%; top:0%; opacity: 0.9;'>
                    <div class='card-body' align='left'>
                    <dl class='row'>
                        <dt class='col-sm-3'>Datos de la transacción</dt>
                        <dd class='col-sm-9'>
                          {$response->{'datos'}}
                        </dd>
                        <dt class='col-sm-3'>Número de infantes</dt>
                        <dd class='col-sm-9'>{$num_infantes}</dd>
                        <dt class='col-sm-3'>Número de niños</dt>
                        <dd class='col-sm-9'>{$num_ninos}</dd>
                        <dt class='col-sm-3'>Número de adultos</dt>
                        <dd class='col-sm-9'>{$num_adultos}</dd>
                        <dt class='col-sm-3'>Ciudad origen</dt>
                        <dd class='col-sm-9'>{$ciudad_origen}</dd>
                        <dt class='col-sm-3'>Ciudad destino</dt>
                        <dd class='col-sm-9'>{$ciudad_destino}</dd>
                        <dt class='col-sm-3'>Fecha de salida</dt>
                        <dd class='col-sm-9'>{$fecha_salida}</dd>
                        <dt class='col-sm-3'>Tarifa</dt>
                        <dd class='col-sm-9'>{$tarifa}</dd>
                        <dt class='col-sm-3'>Beneficios de la tarifa</dt>
                        <dd class='col-sm-9'>{$beneficios_tarifa}</dd>
                      </dl>
                      </div>
                  </div>";
        }
        catch (SoapFault $exception) 
        {
            echo "<h1 style='color:#ffffff';>No se a podido realizar la transacción intente de nuevo porfavor</h1>";      
        }
?>
</body>
</html>