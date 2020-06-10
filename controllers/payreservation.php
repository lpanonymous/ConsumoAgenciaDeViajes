<?php
    $num_reservacion = $_POST['num_reservacion'];
    $fecha_compra = $_POST['fecha_compra'];
    $monto = $_POST['monto'];

    $params = array(
        "numReservacionC" => $num_reservacion,
        "fechacompra" => $fecha_compra,
        "monto" => $monto,
    );
    //conexion al sw
    $client = new SoapClient("http://3.133.140.0:8080/ws/hotel.wsdl");

    try
    {
        $response = $client->__soapCall("Compra", array($params));
        print_r ($response->{'Respuesta'});
        print_r ($response->{'numeroCompra'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>