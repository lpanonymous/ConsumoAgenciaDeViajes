<?php
    $num_habitacion = $_POST['num_habitacion'];
    $params = array(
        "NumHabitacion" => $num_habitacion,
    );
    //conexion al sw
    $client = new SoapClient("http://3.133.140.0:8080/ws/hotel.wsdl");

    try
    {
        $response = $client->__soapCall("Disponibilidad", array($params));
        print_r ($response->{'disponibilidad'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>