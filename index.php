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
    <link rel = "stylesheet"  href = "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" >
    <script  src = "//code.jquery.com/jquery-1.10.2.js" > </script>
    <script  src = "//code.jquery.com/ui/1.11.4/jquery-ui.js" > </script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Aerolinea</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="views/hotel.php">Hotel<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="col-sm-4">
    <div class="card text-white bg-dark mb-3" style="left:0%; top:0%; opacity: 0.9;">
    <div class="card-header">Vuelos</div>
      <div class="card-body">
      <form action="controllers/displaySelectedSingleFlight.php" method="post" autocomplete="off">
        <div class="form-group">
          <div class="col-md-12 mb-0">
            <label for="validationServer01" class="label">Tipo de vuelo</label>
            <select class="form-control" name="tipo_vuelo" onchange="location = this.value;">
              <option value="Vuelo sencillo">Vuelo sencillo</option>
            </select>
          </div>

          <div class="col-md-12 mb-0">
            <label for="validationDefault01" class="label">Número de infantes</label>
            <input type="number" class="form-control" id="validationDefault01" placeholder="Numero de infantes" value="0" required min="0" max="5" name="num_infantes">
          </div>
          <div class="col-md-12 mb-0">
            <label for="validationDefault01" class="label">Número de niños</label>
            <input type="number" class="form-control" id="validationDefault01" placeholder="Numero de niños" value="0" required min="0" max="5" name="num_ninos">
          </div>
          <div class="col-md-12 mb-0">
            <label for="validationDefault01" class="label">Número de adultos</label>
            <input type="number" class="form-control" id="validationDefault01" placeholder="Numero de adultos" value="0" required min="0" max="5" name="num_adultos">
          </div>
          <div class="col-md-12 mb-0">
            <label for="validationServer01" class="label">Ciudad origen</label>
              <input type="text" class="form-control" id="ciudad-origen" placeholder="Ciudad origen" name="ciudad-origen">
          </div>
          <div class="col-md-12 mb-0">
            <label for="validationServer01" class="label">Ciudad destino</label>
              <input type="text" class="form-control" id="ciudad-destino" placeholder="Ciudad destino" name="ciudad-destino">
          </div>

          <div class="col-md-12 mb-4">
            <label for="validationDefault01" class="label">Fecha de ida</label>
            <input type="date" class="form-control" id="validationDefault01" name=fecha_ida>
          </div>

          <div class="col-md-12 mb-0" align="right">
            <button class="btn btn-primary" type="submit">Buscar</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
      <script src="controllersJS/default.js"></script>
      <!--<button class="btn btn-primary" onclick="window.location.href = 'controllers/displaySelectedSingleFlight.php';">Ver vuelos</button>-->
      
    </div>    
</body>
</html>