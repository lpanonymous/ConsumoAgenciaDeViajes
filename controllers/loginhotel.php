<?php
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $params = array(
        "Usuario" => $usuario,
        "Contraseña" => $contrasena,
    );
    //conexion al sw
    $client = new SoapClient("http://3.133.140.0:8080/ws/hotel.wsdl");

    try
    {
        $response = $client->__soapCall("Autenticacion", array($params));
        print_r ($response->{'tipousuario'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>