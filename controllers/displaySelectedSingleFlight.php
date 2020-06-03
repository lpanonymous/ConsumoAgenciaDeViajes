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
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            Aerolinea nacional de México
        </a>
    </nav>
    <div class="bg"><div>
      <nav class="navbar navbar-light" style="background-color: #00e1ffb9;">
        Vuelos disponibles
      </nav>
<?php
    print "<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Airline</title>
    <link rel='stylesheet' href='../styles/style.css'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    <link rel='shortcut icon' type='image/png' href='../resources/images/icon.png'>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    </head>";
    $num_infantes = $_POST['num_infantes'];
    $num_ninos = $_POST['num_ninos'];
    $num_adultos = $_POST['num_adultos'];
    $pais_origen = $_POST['pais_origen'];
    $pais_destino = $_POST['pais_destino'];
    $ciudad_origen = $_POST['ciudad_origen'];
    $ciudad_destino = $_POST['ciudad_destino'];
    $fecha_ida = $_POST['fecha_ida'];
    $tarifa = $_POST['tarifa'];
    $tipo_vuelo = $_POST['tipo_vuelo'];
    
    $params = array(
        "num_infantes" => $num_infantes,
        "num_ninos" => $num_ninos,
        "num_adultos" => $num_adultos,
        "pais_origen" => $pais_origen,
        "pais_destino" => $pais_destino,
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
        print "<div class='table-responsive-sm'>";
        print "<table class='table table-dark' align='center' border='1' style='width:auto; height:20px;'>";
        print "<thead>
        <tr align='center'>
          <th scope='col'>Id</th>
          <th scope='col'>Hora de salida</th>
          <th scope='col'>Hora de llegada</th>
          <th scope='col'>Ciudad origen </th>
          <th scope='col'>Ciudad destino </th>
          <th scope='col'>Precio tarifa basica</th>
          <th scope='col'>Precio tarifa clasica</th>
          <th scope='col'>Precio tarifa amplus</th>
          <th scope='col'>Precio tarifa flexible</th>
          <th scope='col'>Precio tarifa premier</th>
          <th scope='col'></th>
        </tr>
      </thead>";
       print "<tbody>";
        foreach($respuesta as $key => $value)
        {
            print "<tr><td>". $value->{'id'} . "</td><td>" . $value->{'hora_salida'} . "</td><td>" . $value->{'hora_llegada'} . 
            "</td><td>" . $value->{'ciudad_origen'} . "</td><td>" . $value->{'ciudad_destino'} . "</td><td>" . $value->{'precio_tarifa_basica'} .
            "</td><td>" . $value->{'precio_tarifa_clasica'} . "</td><td>" . $value->{'precio_tarifa_amplus'} . "</td><td>" . $value->{'precio_tarifa_flexible'} .
            "</td><td>" . $value->{'precio_tarifa_premier'} . "</td><td><form action='/action_page.php'><button type='submit' value='{$value->{'id'}}' class='btn btn-primary'>Reservar</button></form></td>";
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