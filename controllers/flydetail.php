<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="../resources/images/icon.png">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Detalles del vuelo</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Aerolinea <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
</nav>

    <?php
        $id_vuelo = $_POST['idvuelo'];
        $num_infantes = $_POST['numInfantes'];
        $num_ninos = $_POST['numNinos'];
        $num_adultos = $_POST['numAdultos'];
        $ciudad_origen = $_POST['ciudadOrigen'];
        $ciudad_destino = $_POST['ciudadDestino'];
        $fecha_salida = $_POST['fechaSalida'];
        $tarifa = $_POST['tarifa'];
        $beneficios_tarifa = $_POST['beneficiosTarifa'];
        $precio = $_POST['precio'];
        
        $num_pasajeros = $num_ninos + $num_adultos;
        $total = $precio * $num_pasajeros;

print "<div class='row' >
        <div class='card text-white bg-dark mb-3' style='opacity:0.9'>
        <div class='card-header'>Detalle</div>
        <div class='card-body'>
        <form action='paymentmethod.php' method='post'>
        <div class='form-row'>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Id vuelo</label>
            <input class='form-control' id='disabledInput' type='number' placeholder='{$id_vuelo}' disabled>
            <input name='idvuelo' type='number' value='{$id_vuelo}' style='display:none'>
            </div>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Número de infantes</label>
            <input class='form-control' id='disabledInput' type='number' placeholder='{$num_infantes}' disabled>
            <input name='num_infantes' type='number' value='{$num_infantes}' style='display:none' >
            </div>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Número de niños</label>
            <input class='form-control' id='disabledInput' type='number' placeholder='{$num_ninos}' disabled>
            <input name='num_ninos' type='number' value='{$num_ninos}' style='display:none' >
            </div>
        </div>
        <div class='form-row'>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Número de adultos</label>
            <input class='form-control' id='disabledInput' type='number' placeholder='{$num_adultos}' disabled>
            <input name='num_adultos' type='number' value='{$num_adultos}' style='display:none' >
            </div>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Ciudad origen</label>
            <input class='form-control' id='disabledInput' type='text' placeholder='{$ciudad_origen}' disabled>
            <input name='ciudad_origen' type='text' value='{$ciudad_origen}' style='display:none' >
            </div>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Ciudad destino</label>
            <input class='form-control' id='disabledInput' type='text' placeholder='{$ciudad_destino}' disabled>
            <input name='ciudad_destino' type='text' value='{$ciudad_destino}' style='display:none' >
            </div>
        </div>
        <div class='form-row'>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Fecha de salida</label>
            <input class='form-control' id='disabledInput' type='text' placeholder='{$fecha_salida}' disabled>
            <input name='fecha_salida' type='text' value='{$fecha_salida}' style='display:none' >
            </div>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Tarifa</label>
            <input class='form-control' id='disabledInput' type='text' placeholder='{$tarifa}' disabled>
            <input name='tarifa' type='text' value='{$tarifa}' style='display:none' >
            </div>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Beneficios tarifa</label>
            <input class='form-control' id='disabledInput' type='text' placeholder='{$beneficios_tarifa}' disabled>
            <input name='beneficios_tarifa' type='text' value='{$beneficios_tarifa}' style='display:none' >
            </div>
        </div>

        <div class='form-row'>
            <div class='col-md-4 mb-3'>
            <label for='validationDefault01'>Total</label>
            <input class='form-control' id='disabledInput' type='number' placeholder='{$total}' disabled>
            <input name='total' type='number' value='{$total}' style='display:none' >
            </div>
        </div>
        <div class='col-md-12 mb-0' align='right'>
        <button class='btn btn-primary' type='submit'>Pagar</button>
            </div>
        
        </form>
        </div>
        </div>
        </div>"
        ;
?>

    
</body>
</html>