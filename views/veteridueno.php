<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/hojaestilos.css">
    <link rel="stylesheet" href="../css/rabbit.css">
    <link rel="stylesheet" href="../css/dise.css">

    <script src="../js/bootstrap.min.js"></script>
    <link rel="icon" href="../images/icon.png">
    <title>RegVet</title>
</head>
<body>
<?php
use Vet\query\select;
require_once("../vendor/autoload.php");

session_start();
if(isset($_SESSION['correo'])){
switch ($_SESSION['rol']){
case 'd' || 'v':
    if (($_SESSION['rol']=='d') || ($_SESSION['rol']=='v')){
?>
    <!--Nab-->
    <header>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg bg-light ">
          <div class="offset-1">
               <img src="../images/iconveti.png" alt="" width="65px">
          </div>
          <div class="col-md-5">
               <h5>Registro Veterinario: VetExCola & VetHuellitas</h5>
          </div>
          <div class="container-fluid col-md-4">
              <div class="container" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item sm-12 lg-6">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Opciones
                      </a>
                    <ul class="dropdown-menu">
                        <?php
                        if ($_SESSION['rol'] == 'd'){

                        ?>
                        <li><a class="dropdown-item" href="vetitabla.php">Ver Veterinarios</a></li>
                        <li><a class="dropdown-item" href="sucursales.php">Ver Sucursales</a></li>
                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#agregarveterinario">Agregar Veterinario</a></li>
                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#agregarsucursal">Agregar Sucursal</a></li>
                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#agregarservicio">Agregar Servicio</a></li>
                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#agregarespecialidad">Agregar Especialidad</a></li>
                            <?php
                        }
                        ?>
                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#agregarespecie">Agregar Especie</a></li>
                    </li>
                  </li>

                  </ul>
                  <li class="nav-item sm-12 lg-6">
                    <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#agregarmascota">
                      <a class="nav-link" href="consultasfor.php">Consulta Medica</a>
                    </button>
                  </li>
                    <li class="nav-item sm-12 lg-6">
                        <button type="submit" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#perfil">
                            <a class="nav-link blanco" href="#">Perfil</a>
                        </button>
                    </li>
                </ul>
              </div>
          </div>
        </nav>
        </div>
        <div class="row border-0 rounded-0 sombreado-g"></div>
    </header>

  <!--Contenidos-->
<div class="contenedor1">
      <div class="row row-cols-1 row-cols-md-3 g-5">
      <div class="col">
    <a href="histofecha.php"><div class="card">
      <img src="../images/11.png" class="card-img-top" alt="...">
      <div class="card-body">
          <center><h3 class="card-title btn btn-info btn-lg blanco">Ver historiales por fecha</h3></center>
    </div>
  </div></a>
  </div>

<div class="col">
    <a href="consultasmedico.php"><div class="card">
      <img src="../images/1.png" class="card-img-top" alt="...">
      <div class="card-body">
          <center><h3 class="card-title btn btn-info btn-lg blanco">Ver historiales por Veterinario</h3></center>
      </div>
    </div></a>
  </div>

<div class="col">
    <a href="consultassucursal.php"><div class="card">
      <img src="../images/22.jpg" class="card-img-top" alt="...">
      <div class="card-body">
          <center><h3 class="card-title btn btn-info btn-lg blanco">Ver historiales por sucursal</h3></center>
      </div>
    </div></a>
  </div>

  <div class="col">
    <a href="clientesymascotas.php"><div class="card">
      <img src="../images/3.jpg" class="card-img-top" alt="...">
      <div class="card-body">
          <center><h3 class="card-title btn btn-info btn-lg blanco">Historiales por cliente y mascota</h3></center>
      </div>
    </div></a></div>

    <div class="col">
    <a href="verclientes.php"><div class="card">
      <img src="../images/4.png" class="card-img-top" alt="...">
      <div class="card-body">
        <center><h3 class="card-title btn btn-info btn-lg blanco">Ver Clientes</h3></center>
      </div>
    </div></a></div>
          <?php
          if ($_SESSION['rol']=='d'){
          ?>
    <div class="col">
    <a href="servsucursal.php"><div class="card">
      <img src="../images/5.jpg" class="card-img-top" alt="...">
      <div class="card-body">
          <center><h3 class="card-title btn btn-info btn-lg blanco">Ver servicios por periodo de tiempo</h3></center>
      </div>
    </div></a></div>

    <div class="col">
    <a href="montos.php"><div class="card">
      <img src="../images/7.png" class="card-img-top" alt="...">
      <div class="card-body">
          <center><h3 class="card-title btn btn-info btn-lg blanco">Ver reporte de Montos</h3></center>
      </div>
    </div></a>
    <?php
    }
    ?>

</div>
  </div>
  <!--Conejo-->

  <!--Modals-->
      <!--Agregar Veterinario-->
      <div class="modal fade" tabindex="-1" id="agregarveterinario">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Agregar Nuevo Veterinario</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="scripts/nuevoveti.php" method="post">
                          <div class="mb-3">
                              <label for="Nombre" class="form-label">Nombre</label>
                              <input type="text" class="form-control"  required name="nom" placeholder="Ej: Jesus">
                          </div>
                          <div class="mb-3">
                              <label for="Apellidos" class="form-label">Apellidos</label>
                              <input type="text" class="form-control"  required name="ape" placeholder="Ej: Tlazola">
                          </div>
                          <div class="mb-3">
                              <label for="Nombre" class="form-label">Cedula</label>
                              <input type="text" class="form-control"  required name="cedu" placeholder="Ej: ">
                          </div>
                          <div class="mb-3">
                              <label for="Correo" class="form-label">Correo</label>
                              <input type="email" class="form-control" required name="corr" placeholder="Ej: correo@gmail.com">
                          </div>
                          <div class="mb-3">
                              <label for="pass" class="form-label">Contraseña</label>
                              <input type="password" class="form-control" required name="contra" placeholder="Ej: contraseña">
                          </div>
                          <div class="mb-3">
                          Rol <br>
                           <input type="radio" class="form-check-input" name="rol" value="v">Veterinario
                            <input type="radio" class="form-check-input" name="rol" value="d">Administrador<br>
                          </div>
                          <div class="mb-3">
                          <?php
                            require_once ("../vendor/autoload.php");
                            $query = new select();
                            $cadena = "SELECT especialidad.es_id,especialidad.especialidad FROM especialidad";
                            $reg = $query->seleccionar($cadena);


                            foreach($reg as $value)
                            {
                              echo "<input type='checkbox' name='checkbox[]' value='".$value->es_id."'>".$value->especialidad."<br>";
                            }
                            echo "</label> </div>";
                            ?>
                          </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">REGISTRAR!</button>
                  </div>
                  </form>
              </div> </div>
          </div>
      </div>
      <!--Perfil-->
      <div class="modal fade" tabindex="-1" id="perfil">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Perfil</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                      <?php
                      $correo = $_SESSION['correo'];
                      $query = new select();
                      $cadena1 = "select nombre, apellido, correo from persona where correo = '$correo'";
                      $reg1 = $query->seleccionar($cadena1);
                      foreach ($reg1 as $item){
                          echo "<h4>$item->nombre $item->apellido</h4>";
                          echo "<p>Correo: $item->correo</p>";
                      }
                      ?>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger blanco" data-bs-toggle="modal" data-bs-target="#">
                          <a href="scripts/cerrarsecion.php" class="blanco" style="text-decoration: none">Cerrar Sesion</a>
                      </button>
                  </div>

              </div>
          </div>
      </div></div>
      <!--Agregar sucursal-->
      <div class="modal fade" tabindex="-1" id="agregarsucursal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Agregar Nuevo Sucursal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="scripts/nuevasucursal.php" method="post">
                          <div class="mb-3">
                              <label for="Nombre" class="form-label">Nombre</label>
                              <input type="text" class="form-control"  required name="nom" placeholder="Ej: Huellitas">
                          </div>
                          </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">REGISTRAR!</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
      <!--Agregar servicio-->
      <div class="modal fade" tabindex="-1" id="agregarservicio">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Agregar Servicio</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="scripts/nuevoservicio.php" method="post">
                          <div class="mb-3">
                              <label for="Telefono" class="form-label">Nombre</label>
                              <input type="text" class="form-control"  required name="nom" placeholder="Servicio">
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
      <!--Agregar especialidad-->
      <div class="modal fade" tabindex="-1" id="agregarespecialidad">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Agregar Especialidad</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="scripts/nuevaespe.php" method="post">
                          <div class="mb-3">
                              <label for="Telefono" class="form-label">Nombre</label>
                              <input type="text" class="form-control"  required name="nom" placeholder="Especialidad">
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
      <!--Agregar especie-->
      <div class="modal fade" tabindex="-1" id="agregarespecie">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Agregar Especie</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="scripts/nuevaespecie.php" method="post">
                          <div class="mb-3">
                              <label for="Telefono" class="form-label">Nombre</label>
                              <input type="text" class="form-control"  required name="nom" placeholder="Especie">
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>

      </div>
  </div>
<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" aria-label="Animated striped example"  style="width: 100%"></div>
</div>

<!--Conejo-->
<footer>
    <div class="container-fluid bodyrabbit">
        <div  class="rabbit"></div>
        <div class="clouds"></div>
    </div>
</footer>
</body>
</html>
<?php
}
    else{
        header("refresh:0; scripts/redirectuser.php");
    }
break;
    case 'u':
        header("refresh:0; scripts/redirectuser.php");
        break;
    }

}
else{
        header("refresh:0; ../index.php");
}
?>