<?php
    $usuario = $_POST['usuario'];
    $params = array(
        "Usuario" => $usuario,
    );
    //conexion al sw
    $client = new SoapClient("http://3.133.140.0:8080/ws/hotel.wsdl");

    try
    {
        $response = $client->__soapCall("EliminarCliente", array($params));
        print_r ($response->{'respuesta'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>