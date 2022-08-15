<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/hojaestilos.css">
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
    if ($_SESSION['rol'] == 'd'){
?>
<!--Nab-->
<header>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-light ">
            <div class="offset-1">
                <img src="../images/icon.png" alt="" width="65px">
            </div>
            <div class="col-md-5">
                <h5>Registro Veterinario: VetExCola & VetHuellitas</h5>
            </div>
            <div class="container-fluid col-md-4">
                <div class="container" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item sm-12 lg-6">
                            <button type="button" class="btn col-8">
                                <a class="nav-link" href="veteridueno.php">Regresar a principal</a>
                            </button>
                        </li>
                        <li class="nav-item sm-12 lg-6">
                            <button type="submit" class="btn btn-info offset-1" data-bs-toggle="modal" data-bs-target="#perfil">
                                <a class="nav-link blanco" href="#">Mi Perfil</a>
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
<div class="container text-center">
    <h1 class="bg-primary rounded-pill blanco">Veterinarios</h1>
</div>

<div class="container">
    <div class="container">
    <br>
    <form action="" method="post">
    <select class="form-select" name="condi" aria-label="Default select example">
    <?php
        $condi="activo";
        ?>
    <option  value="activo">Activos</option>
    <option value="inactivo">Inactivos</option>
    </select><br>
    <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

        <table class="table table-responsive text-bg-dark justify-content-between">
                    <thead>
                        <tr>
                            <th>Nombre veterinario</th>
                            <th>Cedula</th>
                            <th>Condicion</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php    
                         extract($_POST);
                        $query = new select();
                        $cadena = "SELECT concat(persona.nombre,' ',persona.apellido) as veterinario,veterinarios.cedula, veterinarios.condicion,veterinarios.v_id  FROM veterinarios join persona on veterinarios.persona=persona.p_id
                        where condicion='$condi'";
                        $dato = $query->seleccionar($cadena);
                         foreach ($dato as $registro){
                            ?>
                        <tr>
                            <td><?php echo $registro->veterinario?></td>
                            <td><?php echo $registro->cedula?></td>
                            <td><?php echo $registro->condicion?></td>
                            <td><a href="datosveti.php?id=<?php echo $registro->v_id?>" class="btn btn-secondary">Ver Mas Datos</a></td>
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
            
</div>
</div>
<br>

<!--Modals-->
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
</div>
<!--Modificar Veterinario-->
<div class="modal fade" tabindex="-1" id="modiveti">
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
</body>
</html>
<?php
}
elseif($_SESSION['rol'] == 'u'){
    header("refresh:0; scripts/redirectuser.php");
}elseif ($_SESSION['rol'] == 'v'){
    header("refresh:0; scripts/redirectvet.php");
    }
}else{
    header("refresh:0; ../index.php");
}
?>