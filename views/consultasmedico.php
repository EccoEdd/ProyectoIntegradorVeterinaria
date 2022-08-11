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
    <h1 class="bg-primary rounded-pill blanco">Historial Medico por Medico</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="#" method="post">
                <?php
                $query = new select();
                $cadena = "select vet.v_id,concat(prsn.nombre,' ',prsn.apellido) as veterinario from veterinarios as vet 
                inner join persona as prsn on prsn.p_id=vet.persona where prsn.rol='v' || prsn.rol='d'";
                $reg = $query->seleccionar($cadena);

                echo "<div class='mb-3'>
                    <label class='control-label'><h5>Medico</h5></label>
                    <select name='usr' class='form-select'>
                    ";
                foreach ($reg as $value) {
                    echo"<option value='".$value->u_id."'>".$value->veterinario."</option>";
                }
                echo "</select>
                    </div>";
                ?>
                <button type="submit" class="btn btn-success col-12">Buscar Consultas de este Medico</button>
            </form>
        </div>
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