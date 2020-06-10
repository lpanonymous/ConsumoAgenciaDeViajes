<?php
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];


    $params = array(
        "UsuarioR" => $usuario,
        "ContraseñaR" => $contrasena,
        "NombreR" => $nombre,
        "ApellidoR" => $apellido,
        "CorreoR" => $correo,
        "TelefonoR" =>$telefono,
    );
    //conexion al sw
    $client = new SoapClient("http://3.133.140.0:8080/ws/hotel.wsdl");

    try
    {
        $response = $client->__soapCall("EditarClienteCambiarInfo", array($params));
        print_r ($response->{'Respuesta'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>