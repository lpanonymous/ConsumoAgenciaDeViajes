<?php
    $usuario = $_POST['usuario'];
    $num_reservacion = $_POST['num_reservacion'];

    $params = array(
        "UsuarioCliente" => $usuario,
        "NumeroReservacion" => $num_reservacion,
    );
    //conexion al sw
    $client = new SoapClient("http://3.133.140.0:8080/ws/hotel.wsdl");

    try
    {
        $response = $client->__soapCall("EliminarReservacion", array($params));
        print_r ($response->{'ResultadoEliminarReservacion'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>