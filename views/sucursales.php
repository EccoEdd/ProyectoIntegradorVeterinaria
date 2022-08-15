<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
    " integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/hojaestilos.css">
    
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
case 'd':
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
    <h1 class="bg-primary rounded-pill blanco">Sucursales</h1>
</div>

<div class="container">
    <div class="container">
    <br>
    <form action="" method="post">
    <select class="form-select" name="condi" aria-label="Default select example">
        <?php
        $condi="activa";
        ?>
    <option  value="activa">Activas</option>
    <option value="inactiva">Inactivas</option>
    </select><br>
    <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <?php
        ?>
        <table class="table table-responsive text-bg-dark justify-content-between">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Condicion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        
                        extract($_POST);
                        $consulta = new select();
                        $cadena = "SELECT * FROM sucursal where sucursal.condicion='$condi'";
                            $tabla = $consulta->seleccionar($cadena);
                            ?>
                    <tbody>
                        <?php    
                         foreach ($tabla as $registro){
                            ?>
                        <tr>
                            <td><?php echo $registro->sucursal?></td>
                            <td><?php echo $registro->condicion?></td>
                            <td><a class='btn btn-secondary sucursal' data-bs-toggle="modal" data-bs-target="#modisucursal" data-id='<?php echo $registro->num_s ?>' data-nombre='<?php echo $registro->sucursal ?>' 
                            data-condicion='<?php echo $registro->condicion ?>'>Modificar</a></td>
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
<!--Modificar sucursal-->
<div class="modal fade" tabindex="-1" id="modisucursal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Modificar Sucursal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="scripts/modisucursal.php" method="post">
                          <div class="mb-3">
                              <label for="Nombre" class="form-label">Nombre</label>
                              <input type="text" disabled="false" class="form-control" id="nombre"  required name="nombre" >
                          </div>
                          <div class="mb-3">
                                Condicion <br>
                                <input type="radio" id="condicion" class="form-check-input"name="condi"  value="activa">Activa 
                                <input type="radio" id="condicion2" class="form-check-input" name="condi"  value="inactiva">Inactiva
                                <input type="text" class="form-control d-none" id="id"  required name="id" >
                                 </div>
                          
                          </div>
                 
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary" id>Guardar Cambios</button>
                  </div>
                  </form>
              </div> 
          </div>
      </div>
      <script src="../js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="../js/store.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.all.min.js"></script>
        <script>
            let id=null
                let sucursal=null
                let condicion=null
            $(".sucursal").click(function(){
                 id=$(this).data("id")
                 sucursal=$(this).data("nombre")
                 condicion=$(this).data("condicion")
                console.log(id)
                console.log(sucursal)
                console.log(condicion)
                $("#nombre").val(sucursal)
                $("#id").val(id)
                if (condicion=="activa") {
                    $("#condicion").attr("checked", true);
                }
                if (condicion=="inactiva" ) {
                    $("#condicion2").attr("checked", true);
                } 
            })
        </script>
</body>
</html>
<?php
    break;
    case 'u':
        header("refresh:0; scripts/redirectuser.php");
        break;
case 'v':
    header("refresh:0; scripts/redirectvet.php");
    break;
    }

}
else{
        header("refresh:0; ../index.php");
}
?>