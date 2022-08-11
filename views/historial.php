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
case 'u':
?>
<!--Nab-->
<header>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-light ">
            <div class="offset-1">
                <img src="../images/iconclie.png" alt="" width="65px">
            </div>
            <div class="col-md-5">
                <h5>Registro Veterinario: VetExCola & VetHuellitas</h5>
            </div>
            <div class="container-fluid col-md-4">
                <div class="container" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item sm-12 lg-6">
                            <button type="button" class="btn col-8">
                                <a class="nav-link" href="cliente.php">Regresar a mascotas</a>
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
    <?php
    $h = $_GET['id'];

    $query = new select();
    $cadena1 = "select nombre from mascotas where m_id = '$h'";
    $reg1 = $query->seleccionar($cadena1);
    foreach ($reg1 as $item){
        echo "<h1 class='bg-primary blanco rounded-pill'>Historial Medico de: $item->nombre</h1>";
    }
    ?>
</div>

<div class="container">
    <form action="#" method="post">
        <label>Fecha Desde:</label>
        <input type="date" class="form-control" placeholder="Start" required name="date1"/>
        <button type="submit" class="btn btn-info col-12 blanc">Buscar</button>
    </form>
</div>
<br>
<?php
    if ($_POST){
        extract($_POST);
        $query = new select();
        $cadena2 = "
                select concat(prsn_vet.nombre,' ',prsn_vet.apellido) as Veterinario,vet.cedula,clnt.mascota,clnt.raza,clnt.sexo,clnt.especie,concat(cnstls.fecha_consulta,' ',cnstls.hora_consulta) as fecha_con,scrsl.sucursal
                ,cnstls.peso,cnstls.temperatura,cnstls.sintomas,cnstls.operado,group_concat(serv.servicio) as servicios
                ,rcts.medicamentos,rcts.prescripcion,cnstls.tipo_pago
                from persona as prsn_vet inner join veterinarios as vet on prsn_vet.p_id=vet.persona inner join consultas as cnstls on cnstls.veterinario=vet.v_id
                inner join
                (select mscts.m_id as msct_id,concat(prsn_cl.nombre,' ',prsn_cl.apellido) as cliente,mscts.nombre as Mascota,mscts.raza,mscts.sexo,espcs.especie,
                prsn_cl.correo from persona as prsn_cl inner join usuarios as usr_cl on prsn_cl.p_id=usr_cl.persona inner join mascotas as mscts 
                on usr_cl.u_id=mscts.usuario inner join especies as espcs on espcs.e_id=mscts.especie) as clnt on clnt.msct_id=cnstls.mascota inner join con_serv on
                con_serv.consulta=cnstls.cons_id inner join servicios as serv on serv.s_id=con_serv.servicio inner join recetas as rcts on cnstls.cons_id=rcts.consulta
                inner join sucursal as scrsl on scrsl.num_s=cnstls.sucursal
                where clnt.msct_id ='$h' && cnstls.fecha_consulta = '$date1' order by cnstls.fecha_consulta;
        ";
        $dato = $query->seleccionar($cadena2);
        foreach ($dato as $item){
            if ($item->fecha_con == null){
                echo "<div class='container'><div class='alert alert-danger border-danger rounded-pill text-center'><h2>Sin Registros</h2></div></div>";
            }else{
        echo"
        <div class='container'>
        <div class='card'>
            <div class='card-header bg-info text-center'>
                <h3>Receta Médica</h3>
            </div>
            <div class='card-body'>
                <h5 class='card-title'>Datos</h5>
                <p class='card-text'>Color: $item->Veterinario</p>
                <p class='card-text'>Sexo: $item->cedula</p>
                <p class='card-text'>Especie: $item->fecha_con</p>
                <p class='card-text'>Raza: $item->sucursal</p>
                <p class='card-text'>Sintomas: $item->sintomas</p>
                <p class='card-text'>Operado: $item->operado</p>
                <p class='card-text'>Peso: $item->peso</p>
                <p class='card-text'>Temperatura: $item->temperatura</p>
                <p class='card-text'>Medicamentos: $item->medicamentos</p>
                <p class='card-text'>Prescripcion: $item->prescripcion</p>
            </div>
            <div class='card-footer'>
            </div>
        </div><div class='progress'>
            <div class='progress-bar progress-bar-striped progress-bar-animated bg-info' aria-label='Animated striped example'  style='width: 100%''>
        </div>
        </div><br>
";}
        }
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
                <button type="submit" class="btn btn-dark blanco" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Vertele">
                    Ver mis numeros de contacto
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger blanco" data-bs-toggle="modal" data-bs-target="#">
                    <a href="scripts/cerrarsecion.php" class="blanco" style="text-decoration: none">Cerrar Sesion</a>
                </button>
            </div>

        </div>
    </div>
</div>
<!--Numeros de contacto-->
<div class="modal fade" tabindex="-1" id="Vertele">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                echo "<h5>Telefonos de Contacto</h5>";
                $cadena2 = "select numero, descripcion from contacto as c join persona as p on c.persona = p.p_id where p.correo = '$correo'";
                $reg2 = $query->seleccionar($cadena2);
                foreach ($reg2 as $numero){
                    echo "<p><b>Numero:</b> $numero->numero <b>Descripcion:</b> $numero->descripcion</p>";
                }
                ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
    break;
    case 'v':
        break;
    case 'd':
        break;
    }
    } else {
        header("refresh:0; scripts/redirectindex.php");
    }
?>