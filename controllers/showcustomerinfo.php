<?php
    $usuario = $_POST['usuario'];
    $params = array(
        "Usuario" => $usuario,
    );
    //conexion al sw
    $client = new SoapClient("http://3.133.140.0:8080/ws/hotel.wsdl");

    try
    {
        $response = $client->__soapCall("EditarClienteMostrarInfo", array($params));
        print_r ($response->{'mensaje'});
        print_r ($response->{'UsuarioR'});
        print_r ($response->{'ContraseñaR'});
        print_r ($response->{'NombreR'});
        print_r ($response->{'ApellidoR'});
        print_r ($response->{'CorreoR'});
        print_r ($response->{'TelefonoR'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>