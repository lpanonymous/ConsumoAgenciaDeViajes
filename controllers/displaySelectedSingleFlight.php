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
        "numInfantes" => $num_infantes,
        "numNinos" => $num_ninos,
        "numAdultos" => $num_adultos,
        "paisOrigen" => $pais_origen,
        "paisDestino" => $pais_destino,
        "ciudadOrigen" => $ciudad_origen,
        "ciudadDestino" => $ciudad_destino,
        "fechaSalida" => $fecha_ida,
    );
    //conexion al sw
    $client = new SoapClient("http://localhost:8080/ws/aerolinea.wsdl");

    try
    {
        $response = $client->__soapCall("ShowSelectedSingleFlight", array($params));
        $respuesta = array_values($response->{'datos'});
        print "<table class='table table-dark' align='center' border='1' style='width:auto; height:20px;'>";
        print "<thead>
        <tr align='center'>
          <th scope='col'>Id</th>
          <th scope='col'>Aerolinea</th>
          <th scope='col'>Codigo avion</th>
          <th scope='col'>Fecha de salida</th>
          <th scope='col'>Hora de llegada</th>
          <th scope='col'>Hora de salida</th>
          <th scope='col'>Id pais origen</th>
          <th scope='col'>Id pais destino </th>
          <th scope='col'>Id ciudad destino </th>
          <th scope='col'>Id ciudad origen </th>
          <th scope='col'>Pais origen </th>
          <th scope='col'>Pais destino </th>
          <th scope='col'>Ciudad origen </th>
          <th scope='col'>Ciudad destino </th>
          <th scope='col'>Lugares disponibles tarifa basica </th>
          <th scope='col'>Lugares disponibles tarifa clasica </th>
          <th scope='col'>Lugares disponibles tarifa amplus </th>
          <th scope='col'>Lugares disponibles tarifa premier </th>
        </tr>
      </thead>";
       print "<tbody>";
        foreach($respuesta as $key => $value)
        {
            print "<tr><td>". $value->{'idvs'} . "</td><td>" . $value->{'aerolinea'} . "</td><td>" . $value->{'codigo_avion'} . 
            "</td><td>" . $value->{'fecha_salida'} . "</td><td>" . $value->{'hora_llegada'} . "</td><td>" . $value->{'hora_salida'} . 
            "</td><td>" . $value->{'idpaisorigen'} . "</td><td>" . $value->{'idpaisdestino'} . "</td><td>" . $value->{'idciudaddestino'} . 
            "</td><td>" . $value->{'idciudadorigen'} . "</td><td>" . $value->{'paisorigen'} . "</td><td>" . $value->{'paisdestino'} .
            "</td><td>" . $value->{'ciudadorigen'} . "</td><td>" . $value->{'ciudaddestino'} . "</td><td>" . $value->{'lugaresdisponiblestarifabasica'} .
            "</td><td>" . $value->{'lugaresdisponiblestarifaclasica'} . "</td><td>" . $value->{'lugaresdisponiblestarifaamplus'} . "</td><td>" . $value->{'lugaresdisponiblestarifapremier'} . "</td>";
        }
        print "</tbody>";
        print "</table>";

        //print_r ($response->{'datos'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>