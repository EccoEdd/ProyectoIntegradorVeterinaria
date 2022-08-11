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

//session_start();
//if(isset($_SESSION['correo'])){
//switch ($_SESSION['rol']){
//case 'd' && 'v':
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
                                <a class="nav-link" href="veridueno.php">Regresar a principal</a>
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
    <h1 class="bg-primary rounded-pill blanco">Historial Medico</h1>
</div>

<div class="container">
    <div class="container">
        <div class='progress'>
            <div class='progress-bar progress-bar-striped progress-bar-animated bg-danger' aria-label='Animated striped example'  style='width: 100%''>
        </div>
    </div>
    <br>
    <?php
        extract($_POST);
        $query = new select();
        $cadena2 = "call vethis($mas)";
        $dato = $query->seleccionar($cadena2);
        foreach ($dato as $item){
            if($item->fecha_consulta == null){
                echo "<div class='alert alert-danger border-danger rounded-pill text-center'><h2>No hay datos aun</h2></div>";
            }else{
            echo"
                <div class='container'>
                <div class='card'>
                    <div class='card-header bg-info text-center'>
                        <h3>Receta Médica</h3>
                    </div>
                    <div class='card-body'>
                      <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>$item->sucursal</li>
                        <li class='list-group-item'>$item->dueno</li>
                        <li class='list-group-item'>$item->veterinario</li>
                        <li class='list-group-item'>$item->datosmas</li>
                        <li class='list-group-item'>$item->consulta</li>
                        <li class='list-group-item'>$item->fecha_consulta</li>
                      </ul>
                    </div>
                    <div class='card-footer'>
                    </div>
                </div><div class='progress'>
                    <div class='progress-bar progress-bar-striped progress-bar-animated bg-danger' 
                    aria-label='Animated striped example'  style='width: 100%'>
                </div>
                </div><br>
            ";}
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

</body>
</html>
<?php
//break;
//case 'u':
//    header("refresh:0;views/scripts/redirectuser.php");
//    break;
//}
//} else {
//    header("refresh:0; scripts/redirectindex.php");
//}
?>