<?php
    $num_habitacion = $_POST['num_habitacion'];
    $usuario = $_POST['usuario'];
    $num_dias = $_POST['num_dias'];
    $fecha_llegada = $_POST['fecha_llegada'];
    $fecha_salida = $_POST['fecha_salida'];

    $params = array(
        "NumHabitacion" => $num_habitacion,
        "UsuarioCliente" => $usuario,
        "NumDias" => $num_dias,
        "FechaLLegada" => $fecha_llegada,
        "FechaSalida" => $fecha_salida,
    );
    //conexion al sw
    $client = new SoapClient("http://3.133.140.0:8080/ws/hotel.wsdl");

    try
    {
        $response = $client->__soapCall("Reservacion", array($params));
        print_r ($response->{'ResultadoReservacion'});
        print_r ($response->{'ResultadoCliente'});
        print_r ($response->{'NumeroReservacion'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>