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
    <h1 class="bg-primary rounded-pill blanco">Cantidad de servicios hechos por sucursal</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="#" method="post">
                <?php
                //por sucursal
                $query = new select();
                $cadena = "select scrl.num_s,scrl.sucursal from sucursal as scrl";
                $reg = $query->seleccionar($cadena);

                echo "<div class='mb-3'>
                    <label class='control-label'><h5>Sucursal</h5></label>
                    <select name='sucu' class='form-select'>
                    ";
                foreach ($reg as $value) {
                    echo"<option value='".$value->num_s."'>".$value->sucursal."</option>";
                }
                echo "</select>
                    </div>";
                ?>
                <input type="text" class="visually-hidden" value="sucursal" name="tipo">
        </div>
        <div class="col-6">
            <?php
            //por servicio
            $query = new select();
            $cadena = "select s_id, servicio from servicios";
            $reg = $query->seleccionar($cadena);

            echo "<div class='mb-3'>
                    <label class='control-label'><h5>Servicio</h5></label>
                    <select name='serv' class='form-select'>
                    ";
            foreach ($reg as $value) {
                echo"<option value='".$value->s_id."'>".$value->servicio."</option>";
            }
            echo "</select>
                    </div>";
            ?>
            <input type="text" class="visually-hidden" value="sucursal" name="tipo">
        </div>
        <div class="col-3" >
                <label for="bus"><h5>Entre Fecha</h5></label>
                <input type="date" class="form-control" name="date1">
                <br>
        </div>
        <div class="col-3" >
            <label for="bus"><h5>Y Fecha</h5></label>
            <input type="date" class="form-control" name="date2">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success col-12">Buscar</button>
        </div>
        </form>
    </div>
</div>
<br>
<div class="container">
    <?php
    if ($_POST) {
        extract($_POST);
            $query = new select();
            $cadena2 = "select scrsl.sucursal,
count(case when con_serv.servicio='$serv' then 1 else null end) as servicio
from consultas as cnslts inner join con_serv on con_serv.consulta=cnslts.cons_id inner join servicios as srvc on srvc.s_id=con_serv.servicio inner join
sucursal as scrsl on scrsl.num_s=cnslts.sucursal where scrsl.num_s='$sucu' and cnslts.fecha_consulta between '$date1' and '$date2'
group by scrsl.sucursal";
            $dato = $query->seleccionar($cadena2);
            echo "
                <table class='table table-hover'>
                <thead class'table-dark'>
                <tr>
                <th>Sucursal</th>
                <th>Servicio</th>
                </thead>
                </tbody>
            ";
            foreach ($dato as $registro) {
                echo "<tr>";
                echo "<td> $registro->sucursal</td>";
                echo "<td> $registro->servicio</td>";
                echo "</tr>";
            }
            echo "</tbody>
                </table>";
    }
    ?>
</div>

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