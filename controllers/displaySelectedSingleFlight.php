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
      <a class="navbar-brand" href="#">Vuelos disponibles</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Aerolinea <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
      
</nav>
<?php
    $num_infantes = $_POST['num_infantes'];
    $num_ninos = $_POST['num_ninos'];
    $num_adultos = $_POST['num_adultos'];
    $ciudad_origen = $_POST['ciudad-origen'];
    $ciudad_destino = $_POST['ciudad-destino'];
    $fecha_ida = $_POST['fecha_ida'];
    $tipo_vuelo = $_POST['tipo_vuelo'];
    
    $params = array(
        "num_infantes" => $num_infantes,
        "num_ninos" => $num_ninos,
        "num_adultos" => $num_adultos,
        "ciudad_origen" => $ciudad_origen,
        "ciudad_destino" => $ciudad_destino,
        "fecha_salida" => $fecha_ida,
    );
    //conexion al sw
    $client = new SoapClient("http://localhost:8080/ws/aerolinea.wsdl");

    try
    {
        $response = $client->__soapCall("ShowSelectedFlight", array($params));
        $respuesta = array_values($response->{'datos'});
        print "<div id='table' class='table-responsive-sm'>";
        print "<table class='table table-dark' border='1' style='width:auto; height:20px; position: absolute;
        left: 12.5%;
        top: 30%;
        '>";
        print "<thead>
        <tr align='center'>
          <th scope='col'>Id</th>
          <th scope='col'>Hora de salida</th>
          <th scope='col'>Hora de llegada</th>
          <th scope='col'>Ciudad origen </th>
          <th scope='col'>Ciudad destino </th>
          <th scope='col'>Basica</th>
          <th scope='col'>Clasica</th>
          <th scope='col'>Amplus</th>
          <th scope='col'>Flexible</th>
          <th scope='col'>Premier</th>
        </tr>
      </thead>";
       print "<tbody>";
        foreach($respuesta as $key => $value)
        {
            print "<tr><td>". $value->{'id'} . 
            "</td><td>" . $value->{'hora_salida'} . 
            "</td><td>" . $value->{'hora_llegada'} . 
            "</td><td>" . $value->{'ciudad_origen'} . 
            "</td><td>" . $value->{'ciudad_destino'} . 
            "</td><td><form action='flydetail.php' method='post'>
                <input name='idvuelo' type='number' value='{$value->{'id'}}' style='display:none'>
                <input name='precio' type='number' value='{$value->{'precio_tarifa_basica'}}' style='display:none'>
                <input name='numInfantes' type='number' value='{$num_infantes}' style='display:none'>
                <input name='numNinos' type='number' value='{$num_ninos}' style='display:none'>
                <input name='numAdultos' type='number' value='{$num_adultos}' style='display:none'>
                <input name='ciudadOrigen' type='text' value='{$ciudad_origen}' style='display:none'>
                <input name='ciudadDestino' type='text' value='{$ciudad_destino}' style='display:none'>
                <input name='fechaSalida' type='text' value='{$fecha_ida}' style='display:none'>
                <input name='tarifa' type='text' value='basica' style='display:none'>
                <input name='beneficiosTarifa' type='text' value='{$value->{'beneficios_tarifa_basica'}}' style='display:none'>
                <button type='submit' value='{$value->{'id'}}' class='btn btn-primary'>{$value->{'precio_tarifa_basica'}}</button>
            </form></td>".
            "</td><td><form action='flydetail.php' method='post'>
                <input name='idvuelo' type='hidden' value='{$value->{'id'}}' style='display:none'>
                <input name='precio' type='hidden' value='{$value->{'precio_tarifa_clasica'}}' style='display:none'>
                <input name='numInfantes' type='hidden' value='{$num_infantes}' style='display:none'>
                <input name='numNinos' type='hidden' value='{$num_ninos}' style='display:none'>
                <input name='numAdultos' type='hidden' value='{$num_adultos}' style='display:none'>
                <input name='ciudadOrigen' type='hidden' value='{$ciudad_origen}' style='display:none'>
                <input name='ciudadDestino' type='hidden' value='{$ciudad_destino}' style='display:none'>
                <input name='fechaSalida' type='hidden' value='{$fecha_ida}' style='display:none'>
                <input name='tarifa' type='hidden' value='clasica' style='display:none'>
                <input name='beneficiosTarifa' type='hidden' value='{$value->{'beneficios_tarifa_clasica'}}' style='display:none'>
                <button type='submit' value='{$value->{'id'}}' class='btn btn-primary'>{$value->{'precio_tarifa_clasica'}}</button>
            </form></td>".
            "</td><td><form action='flydetail.php' method='post'>
                <input name='idvuelo' type='hidden' value='{$value->{'id'}}' style='display:none'>
                <input name='precio' type='hidden' value='{$value->{'precio_tarifa_amplus'}}' style='display:none'>
                <input name='numInfantes' type='hidden' value='{$num_infantes}' style='display:none'>
                <input name='numNinos' type='hidden' value='{$num_ninos}' style='display:none'>
                <input name='numAdultos' type='hidden' value='{$num_adultos}' style='display:none'>
                <input name='ciudadOrigen' type='hidden' value='{$ciudad_origen}' style='display:none'>
                <input name='ciudadDestino' type='hidden' value='{$ciudad_destino}' style='display:none'>
                <input name='fechaSalida' type='hidden' value='{$fecha_ida}' style='display:none'>
                <input name='tarifa' type='hidden' value='amplus' style='display:none'>
                <input name='beneficiosTarifa' type='hidden' value='{$value->{'beneficios_tarifa_amplus'}}' style='display:none'>
                <button type='submit' value='{$value->{'id'}}' class='btn btn-primary'>{$value->{'precio_tarifa_amplus'}}</button>
            </form></td>". 
            "</td><td><form action='flydetail.php' method='post'>
                <input name='idvuelo' type='hidden' value='{$value->{'id'}}' style='display:none'>
                <input name='precio' type='hidden' value='{$value->{'precio_tarifa_flexible'}}' style='display:none'>
                <input name='numInfantes' type='hidden' value='{$num_infantes}' style='display:none'>
                <input name='numNinos' type='hidden' value='{$num_ninos}' style='display:none'>
                <input name='numAdultos' type='hidden' value='{$num_adultos}' style='display:none'>
                <input name='ciudadOrigen' type='hidden' value='{$ciudad_origen}' style='display:none'>
                <input name='ciudadDestino' type='hidden' value='{$ciudad_destino}' style='display:none'>
                <input name='fechaSalida' type='hidden' value='{$fecha_ida}' style='display:none'>
                <input name='tarifa' type='hidden' value='flexible' style='display:none'>
                <input name='beneficiosTarifa' type='hidden' value='{$value->{'beneficios_tarifa_flexible'}}' style='display:none'>
                <button type='submit' value='{$value->{'id'}}' class='btn btn-primary'>{$value->{'precio_tarifa_flexible'}}</button>
            </form></td>". 
            "</td><td><form action='flydetail.php' method='post'>
                <input name='idvuelo' type='hidden' value='{$value->{'id'}}' style='display:none'>
                <input name='precio' type='hidden' value='{$value->{'precio_tarifa_premier'}}' style='display:none'>
                <input name='numInfantes' type='hidden' value='{$num_infantes}' style='display:none'>
                <input name='numNinos' type='hidden' value='{$num_ninos}' style='display:none'>
                <input name='numAdultos' type='hidden' value='{$num_adultos}' style='display:none'>
                <input name='ciudadOrigen' type='hidden' value='{$ciudad_origen}' style='display:none'>
                <input name='ciudadDestino' type='hidden' value='{$ciudad_destino}' style='display:none'>
                <input name='fechaSalida' type='hidden' value='{$fecha_ida}' style='display:none'>
                <input name='tarifa' type='hidden' value='premier' style='display:none'>
                <input name='beneficiosTarifa' type='hidden' value='{$value->{'beneficios_tarifa_premier'}}' style='display:none'>
                <button type='submit' value='{$value->{'id'}}' class='btn btn-primary'>{$value->{'precio_tarifa_premier'}}</button>
            </form></td>";
        }
        print "</tbody>";
        print "</table>";
        print "</div>";

        //print_r ($response->{'datos'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>
</body>
</html>