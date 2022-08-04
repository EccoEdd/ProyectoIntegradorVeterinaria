<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/hojaestilos.css">
    <link rel="stylesheet" href="css/rabbit.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="images/icon.png">
    <title>RegVet</title>
</head>

<body>
    <!--Nab-->
    <header>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg bg-light ">
          <div class="offset-1">
               <img src="images/icon.png" alt="" width="65px">
          </div>
          <div class="col-md-5">
               <h5>Registro Veterinario: VetExCola & VetHuellitas</h5>
          </div>
          <div class="container-fluid col-md-4">
              <div class="container" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item sm-12 lg-6">
                    <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#register">
                      <a class="nav-link active" href="#">No tengo cuenta, Registrame</a>
                    </button>
                  </li>
                  <li class="nav-item sm-12 lg-6">
                    <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#login">
                      <a class="nav-link" href="#">Quiero acceder a mi cuenta</a>
                    </button>
                  </li>
                    <li class="nav-item sm-12 lg-6">
                        <button type="submit" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#loginvet">
                            <a class="nav-link blanco" href="#">Soy Médico</a>
                        </button>
                    </li>
                </ul>
              </div>
          </div>
        </nav>
        </div>
        <div class="card border-0 rounded-0 sombreado-g"></div>
    </header>

  <!--Contenidos-->
  <div class="container">
    <div id="carouselCaptions" class="carousel carousel-dark slide" data-bs-ride="false">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/bravecto.png" class="d-block w-100 imagecarr" alt="Producto" >
          <div class="carousel-caption d-none d-md-block">
            <h5>Manten protegida a tu mascota con Bravecto en sus distintas precentaciones</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/nextgard.png" class="d-block w-100 imagecarr" alt="Producto">
          <div class="carousel-caption d-none d-md-block">
            <h5>Tenemos muchas opciones como Nextgard</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/nupec.png" class="d-block w-100 imagecarr" alt="Producto">
          <div class="carousel-caption d-none d-md-block">
            <h5>Gran variedad de alimentos Nupec</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/royal.png" class="d-block w-100 imagecarr" alt="Producto">
          <div class="carousel-caption d-none d-md-block">
            <h5>Si prefieres una opcion mucho mejor...</h5>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="container">
    <div class="card ban">
      <h1>Nuestros Servicios</h1>
    </div><br>
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Servicios Médicos</h5>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">Consultas Médicas</li>
                  <li class="list-group-item">Esterilizaciones</li>
                  <li class="list-group-item">Vacunacion</li>
                  <li class="list-group-item">Pruebas PCR</li>
                  <li class="list-group-item">Aplicacion de Medicamentos</li>
                  <li class="list-group-item">Desparacitaciones</li>
                  <li class="list-group-item">Radiografias</li>
                  <li class="list-group-item">Estudios</li>
                  <li class="list-group-item">Hospitalicacion</li>
              </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Servicios Estéticos</h5>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">Baños</li>
                  <li class="list-group-item">Corte de pelo</li>
                  <li class="list-group-item">Corte de uñas</li>  
              </ul>
          </div>
        </div><br>
        <img src="images/dogandcat.png" alt="dog" class="col-sm-7 offset-3 d-none d-sm-block">
      </div>
    </div>
  </div><br>
  
  <div class="container">
  <div class="card text-center">
      <div class="card-header bg-info">
        <h5>Horarios de disponibilidad</h5>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Lunes a Viernes: 9am - 8pm</li>
          <li class="list-group-item">Sabados: 9am - 5pm</li>
          <li class="list-group-item">Domingos: 11am - 4pm</li>
        </ul>
      </div>
      <div class="card-footer bg-info">
        Servicios a Domicilio a cualquier hora, dependiendo de la disponibilidad del Médico designado.
      </div>
    </div>
  </div><br>

  <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" aria-label="Animated striped example"  style="width: 100%"></div>
  </div>

  <!--Conejo-->
  <footer>
    <div class="container-fluid bodyrabbit">
      <div  class="rabbit"></div>
      <div class="clouds"></div>
      <h3>Gracias por su preferencia</h3>
    </div>
  </footer>

  <!--Modals-->
  <div class="container">
      <!--PopUP-->
    <div class="modal fade" tabindex="-1" id="inicio" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Servicio a domicilio las 24 horas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>También atendemos a domicilio, asegurate de preguntar al medico a cargo para mas información. <br>
              Solo recuerda, Esto depende de la disponibilidad del Médico a cargo de este servicio.
            </p><br>
              <img src="images/domicilio.png" alt="domicilio" width="100%">
          </div>
        </div>
      </div>
    </div>

      <!--Login-->
      <div class="modal fade" tabindex="-1" id="login">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Ingreso a mi cuenta</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="" method="post">
                          <div class="mb-3">
                              <label for="correo" class="form-label">Correo de Identificacion</label>
                              <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" required name="correo" placeholder="Ej: ejemplo@gmail.com">
                          </div>
                          <div class="mb-3">
                              <label for="contraseña" class="form-label">Contraseña</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" required name="pass" placeholder="Ej: contraseña">
                          </div>
                          <div class="container">
                              <div class="col-5 offset-3">
                                  <img src="images/med.png" alt="med" width="100%">
                              </div>
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-info" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#register">No tengo cuenta,
                      registrame!</button>
                      <button type="submit" class="btn btn-primary">Acceder</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>

      <!--Login-->
      <div class="modal fade" tabindex="-1" id="loginvet">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Bienvenido de Regreso Medico</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="" method="post">
                          <div class="mb-3">
                              <label for="correo" class="form-label">Correo de Identificacion</label>
                              <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" required name="correo" placeholder="Ej: ejemplo@gmail.com">
                          </div>
                          <div class="mb-3">
                              <label for="contraseña" class="form-label">Contraseña</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" required name="pass" placeholder="Ej: contraseña">
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Acceder</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>

      <!--Registro-->
      <div class="modal fade" tabindex="-1" id="register">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Creacion de mi cuenta</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="views/scripts/nuevousuario.php" method="post">
                          <div class="mb-3">
                              <label for="Nombre" class="form-label">Nombre</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" required name="nom" placeholder="Ej: Jesus">
                          </div>
                          <div class="mb-3">
                              <label for="Apellidos" class="form-label">Apellidos</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" required name="ape" placeholder="Ej: Tlazola">
                          </div>
                          <div class="mb-3">
                              <label for="Correo" class="form-label">Correo</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="cor" placeholder="Ej: correo@gmail.com">
                          </div>
                          <div class="mb-3">
                              <label for="pass" class="form-label">Contraseña</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" required name="con" placeholder="Ej: contraseña">
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quiza luego</button>
                      <button type="submit" class="btn btn-primary">REGISTRAME!</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>

      <!--ScriptPopUP-->
    <script type="text/javascript ">
      var myModal = new bootstrap.Modal(document.getElementById('inicio'), {})
      myModal.toggle()
    </script>
  </div>

</body>
</html>