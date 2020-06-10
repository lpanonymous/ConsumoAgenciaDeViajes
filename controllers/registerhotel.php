<?php
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $params = array(
        "Usuario" => $usuario,
        "Contraseña" => $contrasena,
        "Nombre" => $nombre,
        "Apellido" => $apellido,
        "Correo" => $correo,
        "Telefono" => $telefono,
    );
    //conexion al sw
    $client = new SoapClient("http://3.133.140.0:8080/ws/hotel.wsdl");

    try
    {
        $response = $client->__soapCall("CrearCliente", array($params));
        print_r ($response->{'respuesta'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>