<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="resources/images/icon.png">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <!-- Hola mundo -->
    <!-- Image and text -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            Aerolinea nacional de México
        </a>
    </nav>
    <div class="bg"><div>
      <nav class="navbar navbar-light" style="background-color: #00e1ffb9;">
        Buscar vuelo sencillo
      </nav>
    <form action="controllers/displaySelectedSingleFlight.php" method="post" autocomplete="off">
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationServer01">Tipo de vuelo</label>
            <select class="form-control" name="tipo_vuelo" onchange="location = this.value;">
              <option value="Vuelo sencillo">Vuelo sencillo</option>
                <option value="views/buscarvueloidayvuelta.php">Ida y vuelta</option>
            </select>
          </div>

          <div class="col-md-4 mb-3">
            <label for="validationDefault01">Número de infantes</label>
            <input type="number" class="form-control" id="validationDefault01" placeholder="Numero de infantes" value="1" required min="1" max="5" name="num_infantes">
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationDefault01">Número de niños</label>
            <input type="number" class="form-control" id="validationDefault01" placeholder="Numero de niños" value="1" required min="1" max="5" name="num_ninos">
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationDefault01">Número de adultos</label>
            <input type="number" class="form-control" id="validationDefault01" placeholder="Numero de adultos" value="1" required min="1" max="5" name="num_adultos">
          </div>

          <div class="col-md-4 mb-3">
            <label for="validationServer01">País origen</label>
            <select class="form-control" name="pais_origen">
                <option value="MEXICO">MEXICO</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationServer01">País destino</label>
            <select class="form-control" name="pais_destino">
                <option value="MEXICO">MEXICO</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationServer01">Ciudad origen</label>
            <select class="form-control" name="ciudad_origen">
                <option value="VERACRUZ">VERACRUZ</option>
                <option value="SONORA">SONORA</option>
                <option value="PUEBLA">PUEBLA</option>
                <option value="JALISCO">JALISCO</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationServer01">Ciudad destino</label>
            <div class="autocompletar">
            
            <input type="text" class="form-control" id="ciudad-destino" placeholder="Ciudad destino" name="ciudad-destino">
        </div>
          </div>

          <div class="col-md-4 mb-3">
            <label for="validationDefault01">Fecha de ida</label>
            <input type="date" class="form-control" id="validationDefault01" name=fecha_ida>
          </div>

          <div class="col-md-4 mb-3">
            <label for="validationServer01">Tarifa</label>
            <select class="form-control" name="tarifa">
                <option value="BASICA">BASICA</option>
            </select>
          </div>
        </div>
        <button class="btn btn-primary" type="submit">Buscar</button>
      </form>
      <script src="controllersJS/default.js"></script>
      <!--<button class="btn btn-primary" onclick="window.location.href = 'controllers/displaySelectedSingleFlight.php';">Ver vuelos</button>-->
      
    </div>
    <nav class="navbar navbar-light" style="background-color: #00e1ffb9; width: 75%; left: 12.5%;">
      Vuelos disponibles
    </nav>
    <?php
    //conexion al sw
    $client = new SoapClient("http://localhost:8080/ws/aerolinea.wsdl");

    try
    {
        $response = $client->__soapCall("DisplayAllSingleFlight", array());
        $respuesta = array_values($response->{'datos'});
        print "<table class='table table-dark' align='center' border='1' style='width:auto; height:20px;'>";
        print "<thead>
        <tr align='center'>
          <th scope='col'>Id</th>
          <th scope='col'>Aerolinea</th>
          <th scope='col'>Codigo avion</th>
          <th scope='col'>Fecha de salida</th>
          <th scope='col'>Hora de llegada</th>
          <th scope='col'>Hora de salida</th>
          <th scope='col'>Id pais origen</th>
          <th scope='col'>Id pais destino </th>
          <th scope='col'>Id ciudad destino </th>
          <th scope='col'>Id ciudad origen </th>
          <th scope='col'>Pais origen </th>
          <th scope='col'>Pais destino </th>
          <th scope='col'>Ciudad origen </th>
          <th scope='col'>Ciudad destino </th>
          <th scope='col'>Lugares disponibles tarifa basica </th>
          <th scope='col'>Lugares disponibles tarifa clasica </th>
          <th scope='col'>Lugares disponibles tarifa amplus </th>
          <th scope='col'>Lugares disponibles tarifa premier </th>
        </tr>
      </thead>";
       print "<tbody>";
        foreach($respuesta as $key => $value)
        {
            print "<tr><td>". $value->{'idvs'} . "</td><td>" . $value->{'aerolinea'} . "</td><td>" . $value->{'codigo_avion'} . 
            "</td><td>" . $value->{'fecha_salida'} . "</td><td>" . $value->{'hora_llegada'} . "</td><td>" . $value->{'hora_salida'} . 
            "</td><td>" . $value->{'idpaisorigen'} . "</td><td>" . $value->{'idpaisdestino'} . "</td><td>" . $value->{'idciudaddestino'} . 
            "</td><td>" . $value->{'idciudadorigen'} . "</td><td>" . $value->{'paisorigen'} . "</td><td>" . $value->{'paisdestino'} .
            "</td><td>" . $value->{'ciudadorigen'} . "</td><td>" . $value->{'ciudaddestino'} . "</td><td>" . $value->{'lugaresdisponiblestarifabasica'} .
            "</td><td>" . $value->{'lugaresdisponiblestarifaclasica'} . "</td><td>" . $value->{'lugaresdisponiblestarifaamplus'} . "</td><td>" . $value->{'lugaresdisponiblestarifapremier'} . "</td>";
        }
        print "</tbody>";
        print "</table>";

        //print_r ($response->{'datos'});
    }
    catch (SoapFault $exception) 
    {
        echo $exception;      
    }
?>
    </div>
    
</body>
</html>