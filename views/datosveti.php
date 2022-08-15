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
switch ($_SESSION['rol']){
case 'd' && 'v':
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
    <h1 class="bg-primary rounded-pill blanco">Veterinario</h1>
</div>

<div class="container">
    <div class="container">
        <div class='progress'>
            <div class='progress-bar progress-bar-striped progress-bar-animated bg-danger' aria-label='Animated striped example'  style='width: 100%'>
        </div>
    </div>
    <br>
    <?php
    $id=$_GET['id'];
        $query = new select();
        $cadena2 = "SELECT * FROM persona join veterinarios on persona.p_id=veterinarios.persona
        where veterinarios.v_id=$id";
        $dato = $query->seleccionar($cadena2);
        foreach ($dato as $item){
            echo"
                <div class='container'>
                <div class='card'>
                    <div class='card-header bg-info text-center'>
                        <h3>Datos de Medico</h3>
                    </div>
                    <div class='card-body'>
                      <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>Veterinario: $item->nombre $item->apellido</li>
                        <li class='list-group-item'>Correo: $item->correo</li>
                        <li class='list-group-item'>Cedula: $item->cedula</li>
                        <li class='list-group-item'>Especialidades</li>";
                        $query = new select();
                        $cadena = "SELECT * FROM  veterinarios 
                        join vet_esp on vet_esp.veterinarios=veterinarios.v_id join especialidad on especialidad.es_id=vet_esp.especialidades
                        where veterinarios.v_id=$id";
                        $datos = $query->seleccionar($cadena);
                        foreach($datos as $ite){
                        echo "<li class='list-group-item'>$ite->especialidad </li>";
                        }
                      echo "</ul>
                    </div>
                    
                    <div class='card-footer'>
                    <div class='offset-11 col-md-4'>
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modificarveti'>Modificar</button>
                    </div>
                    </div>
                </div><div class='progress'>
                    <div class='progress-bar progress-bar-striped progress-bar-animated bg-danger' 
                    aria-label='Animated striped example'  style='width: 100%'>
                </div>
                </div><br>
            ";
    }
    ?>
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
<div class="modal fade" tabindex="-1" id="modificarveti">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Modificar Veterinario</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="scripts/modiveti.php?id=<?php echo $id?>" method="post">
                        <?php
                        
                        foreach ($dato as $valor){
                        ?>
                          <div class="mb-3">
                              <label for="Nombre" class="form-label">Nombre</label>
                              <input type="text" disabled="false" class="form-control" value="<?php echo $valor->nombre ?>" required name="nom" placeholder="Ej: Jesus">
                          </div>
                          <div class="mb-3">
                              <label for="Apellidos" class="form-label">Apellidos</label>
                              <input type="text" disabled="false" class="form-control" value="<?php echo $valor->apellido ?>" required name="ape" placeholder="Ej: Tlazola">
                          </div>
                          <div class="mb-3">
                              <label for="Nombre" class="form-label">Cedula</label>
                              <input type="text"  class="form-control" value="<?php echo $valor->cedula ?>" required name="cedu" placeholder="Ej: ">
                          </div>
                          <div class="mb-3">
                              <label for="Correo" class="form-label">Correo</label>
                              <input type="email" disabled="false" class="form-control" value="<?php echo $valor->correo ?>" required name="corr" placeholder="Ej: correo@gmail.com">
                              <div class="mb-3">
                                Condicion <br>
                                
                                <input type="radio" class="form-check-input"<?php if ($valor->condicion=='activo') { echo "checked"; }
                                ?> name="condi" value="activo">Activo 
                                <input type="radio" class="form-check-input"<?php if ($valor->condicion=='inactivo') { echo "checked"; }
                                ?> name="condi" value="inactivo">Inactivo
                                 </div>
                          <?php
                        }
                            require_once ("../vendor/autoload.php");

                            $query2 = new select();
                            $cadena2 = "SELECT * FROM  veterinarios 
                            join vet_esp on vet_esp.veterinarios=veterinarios.v_id join especialidad on especialidad.es_id=vet_esp.especialidades
                            where veterinarios.v_id=$id";
                            $datos = $query2->seleccionar($cadena2);
                            foreach($datos as $ite)
                            {
                            echo "<li>$ite->especialidad</li>";
                            }
                            $query = new select();
                            $cadena = "SELECT especialidad.especialidad, especialidad.es_id FROM especialidad left join
                            (SELECT * FROM vet_esp  join especialidad on especialidad.es_id=vet_esp.especialidades
                            where vet_esp.veterinarios=$id) AS vet on vet.es_id=especialidad.es_id
                            where vet.veterinarios is null";
                            $reg = $query->seleccionar($cadena);
                             

                            foreach($reg as $value)
                            {
                              echo "<input type='checkbox' name='checkbox[]' value='".$value->es_id."'>" .$value->especialidad."<br>";
                            }
                            echo "</label> </div>";
                            ?>
                          </div>
                 
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </div>
                  </form>
              </div> </div>
          </div>
      </div>
</body>
</html>
<?php
break;
case 'u':
    header("refresh:0;views/scripts/redirectuser.php");
    break;
}
}
else{
    header("refresh:0; ../index.php");
}
?>