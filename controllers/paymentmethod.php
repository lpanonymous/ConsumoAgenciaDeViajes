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
      <a class="navbar-brand" href="#">Procesar transacción</a>

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
    $num_infantes = $_POST['num_infantes'];
    $num_ninos = $_POST['num_ninos'];
    $num_adultos = $_POST['num_adultos'];
    $ciudad_origen = $_POST['ciudad_origen'];
    $ciudad_destino = $_POST['ciudad_destino'];
    $fecha_salida = $_POST['fecha_salida'];
    $tarifa = $_POST['tarifa'];
    $beneficios_tarifa = $_POST['beneficios_tarifa'];
    $total = $_POST['total'];
        print "<form action='processpayment.php' method='post'>
                <div class='form-group' align='center'>
                    <input name='idvuelo' type='number' value='{$id_vuelo}' style='display:none' >
                    <div class='col-sm-4'>
                        <input type='text' class='form-control' id='validationDefault01' placeholder='Nombre cliente' name='nombre_cliente' value='Pablo Reyes'>
                    </div>
                    <div class='col-sm-4'>
                        <input type='number' class='form-control' id='validationDefault01' placeholder='Numero de tarjeta' name='numero_tarjeta' value='3250000000000000' required min='3250000000000000' max='5499999999999999'>
                    </div>
                    <div class='col-sm-4'>
                        <input type='text' class='form-control' id='validationDefault01' placeholder='Fecha de vencimiento' name='fecha_vencimiento' value='11/24'>
                    </div>
                    <div class='col-sm-4'>
                        <input type='number' class='form-control' id='validationDefault01' placeholder='Código CVC' name='codigo_cvc' value=123>
                    </div>
                    <div class='col-sm-4'>
                        <input type='number' class='form-control' id='validationDefault01' placeholder='{$total}' name='cantidad' value='{$total}' disabled>
                        <input name='cantidad' type='number' value='{$total}' style='display:none'>
                    </div>
                    <input name='num_infantes' type='number' value='{$num_infantes}' style='display:none' >
                    <input name='num_ninos' type='number' value='{$num_ninos}' style='display:none' >
                    <input name='num_adultos' type='number' value='{$num_adultos}' style='display:none' >
                    <input name='ciudad_origen' type='text' value='{$ciudad_origen}' style='display:none' >
                    <input name='ciudad_destino' type='text' value='{$ciudad_destino}' style='display:none' >
                    <input name='fecha_salida' type='text' value='{$fecha_salida}' style='display:none' >
                    <input name='tarifa' type='text' value='{$tarifa}' style='display:none' >
                    <input name='beneficios_tarifa' type='text' value='{$beneficios_tarifa}' style='display:none' >
                    <button class='btn btn-primary' type='submit'>Pagar</button>
                </div>
               </form>";
    ?>
</body>
</html>