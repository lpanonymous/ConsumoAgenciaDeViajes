<?php
//Parámetros
    $tipo_vuelo = $_POST['tipo_vuelo'];
    $num_infantes = $_POST['num_infantes'];
    $num_ninos = $_POST['num_ninos'];
    $num_adultos = $_POST['num_adultos'];
    $pais_origen = $_POST['pais_origen'];
    $pais_destino = $_POST['pais_destino'];
    $ciudad_origen = $_POST['ciudad_origen'];
    $ciudad_destino = $_POST['ciudad_destino'];
    $fecha_ida = $_POST['fecha_ida'];
    $tarifa = $_POST['tarifa'];
    /*echo $num_infantes. "<br>";
    echo $num_ninos. "<br>";
    echo $num_adultos. "<br>";
    echo $pais_origen. "<br>";
    echo $pais_destino. "<br>";
    echo $ciudad_origen. "<br>";
    echo $ciudad_destino. "<br>";
    echo $fecha_ida. "<br>";
    echo $fecha_vuelta. "<br>";
    echo $tarifa. "<br>";
    echo $tipo_vuelo. "<br>";*/
    
    //conexion al sw
    $client = new SoapClient("http://localhost:8080/ws/aerolinea.wsdl");

    if($tipo_vuelo == "Vuelo ida y vuelta")
    {
        $fecha_vuelta = $_POST['fecha_vuelta'];
        $params = array(
            "numAdultos" => $num_adultos,
            "numNinos" => $num_ninos,
            "numInfantes" => $num_infantes,
            "paisOrigen" => $pais_origen,
            "paisDestino" => $pais_destino,
            "ciudadOrigen" => $ciudad_origen,
            "ciudadDestino" => $ciudad_destino,
            "fechaIda" => $fecha_ida,
            "fechaVuelta" => $fecha_vuelta,
            "tarifa" => $tarifa,
        );
        try
        {
            $response = $client->__soapCall("CreateRoundTripFlightReservation", array($params));
            print "<h1>". $response->{"datos"} . "</h1>";           
        }
        catch (SoapFault $exception) 
        {
            echo $exception;      
        }
    }
    else
    {
        $params = array(
            "numAdultos" => $num_adultos,
            "numNinos" => $num_ninos,
            "numInfantes" => $num_infantes,
            "paisOrigen" => $pais_origen,
            "paisDestino" => $pais_destino,
            "ciudadOrigen" => $ciudad_origen,
            "ciudadDestino" => $ciudad_destino,
            "fechaIda" => $fecha_ida,
            "tarifa" => $tarifa,
        );
        try
        {
            $response = $client->__soapCall("CreateSimpleFlightReservation", array($params));
            print "<h1>". $response->{"datos"} . "</h1>";           
        }
        catch (SoapFault $exception) 
        {
            echo $exception;      
        }
    }
    
?>