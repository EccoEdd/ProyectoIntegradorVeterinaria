<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/hojaestilos.css">
    <link rel="stylesheet" href="../css/cita.css">
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
</header>
<div class=" border-0 rounded-0 sombreado-g"></div>


<!--Contenidos-->
<div class="container text-center">
    <h1 class="bg-primary rounded-pill blanco">Consulta Medica</h1>
</div>

<div class="contenedor2">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <?php
                    $query = new select();
                    $cadena = "select concat(nombre,' ',apellido) as nombre, correo, u_id from persona join usuarios on persona=p_id order by nombre";
                    $reg = $query->seleccionar($cadena);

                    echo "<label class='control-label'><h5>Cliente</h5></label>
                    <select name='usr' class='form-select'>";
                    foreach ($reg as $value) {
                        echo"<option value='".$value->u_id."'>".$value->nombre." / ".$value->correo."</option>";
                    }
                    echo "</select>";
                ?>
                <br>
                <button type="submit" class="btn btn-success col-12">Buscar Mascotas de este cliente</button>
                </form>
        </div>
        <div class="col-md-6">
            <form action="scripts/nuevaconsu.php" method="post">
                <?php
                    if ($_POST){
                        extract($_POST);
                        $query = new select();
                        $cadena = "select nombre, m_id from mascotas join usuarios on usuario=u_id where u_id = '$usr'";
                        $reg = $query->seleccionar($cadena);

                        echo "
                        <label class='control-label'><h5>Mascota</h5></label>
                        <select name='mas' class='form-select'>
                        ";
                        foreach ($reg as $value) {
                            echo"<option value='".$value->m_id."'>".$value->nombre."</option>";
                        }
                        echo "</select>";
                    }
                ?>
          </div>      
        <div class="col-md-6">
            <?php
            $query = new select();
            $cadena = "SELECT vet.v_id,concat(prsn.nombre,' ',prsn.apellido) as veterinario from 
            veterinarios as vet inner join persona as prsn on prsn.p_id=vet.persona order by veterinario asc";
            $reg = $query->seleccionar($cadena);

            echo "<div class='col-mb-6>
            <label class='control-label'>
            Veterinario</label>
            <select name='veti' class='form-select'>";

            foreach($reg as $value)
            {   
              echo "<option value='".$value->v_id."'>".$value->veterinario."</option>";
            }
            echo "</select> </div>";
            ?>
        </div><br>
        <div class="col-md-6">
            <label for="inputAddress2" class="form-label">Sucursal</label>
            <?php
            $queryd = new select();
            $cadena = "SELECT * from sucursal";
            $reg = $queryd->seleccionar($cadena);

            echo "<select name='sucu' class='form-select'>";

            foreach($reg as $value)
            {   
              echo "<option value='".$value->num_s."'>".$value->sucursal."</option>";
            }
            echo "</select>";
            ?>
        </div>
        <div class="col-md-2">
            <label for="inputAddress2" class="form-label">Peso</label>
            <input type="text" class="form-control" name="peso">
        </div>
        <div class="col-md-2">
            <label for="inputAddress2" class="form-label">Temperatura</label>
            <input type="text" class="form-control" name="tem">
        </div>
        <div class="col-md-8">
            <label for="inputAddress2" class="form-label">Sintomas</label>
            <input type="text" class="form-control" name="sinto">
        </div>
        <div class="col-md-2">
            <label for="inputAddress2" class="form-label">Operado</label><br>
            <input type="radio" class="form-check-input" name="op" value="Si">Si
            <input type="radio" class="form-check-input" name="op" value="No">No
        </div>
        <div class="col-md-6">
            <label for="inputAddress2" class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="des">
        </div>
        <div class="col-md-6">
            <label for="inputAddress2" class="form-label">Medicamentos</label>
            <input type="text" class="form-control" name="med">
        </div>
        <div class="col-md-6">
            <label for="inputAddress2" class="form-label">Prescripcion</label>
            <input type="text" class="form-control" name="pres">
        </div>
        <div class="col-md-2">
            <label for="inputAddress2" class="form-label">Servicios</label><br>
            <?php
                require_once ("../vendor/autoload.php");
                $query = new select();
                $cadena = "SELECT * FROM servicios";
                $reg = $query->seleccionar($cadena);
                foreach($reg as $value)
                {
                echo "<input type='checkbox' name='checkbox[]' value='".$value->s_id."'>".$value->servicio."<br>";
                }
                echo "</label>";
                ?>
        </div>
        <div class="col-md-2">
            <label for="inputAddress2" class="form-label">Tipo De Pago</label>
            <input type="text" class="form-control" name="tipp">
        </div>
        <div class="col-md-2">
            <label for="inputAddress2" class="form-label">Monto Total</label>
            <input type="text" class="form-control" name="mont">
        </div>
        <div class="offset-10 col-md-4">
        <a href="veteridueno.php" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
            </form>
        </div>
    </div>
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