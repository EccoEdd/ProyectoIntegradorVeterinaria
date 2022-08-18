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
    <div class="card border-0 rounded-0 sombreado-g"></div>
</header>
<!--Contenidos-->
<div class="container text-center">
    <h1 class="bg-primary rounded-pill blanco">Historial Medico por Sucursal</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="#" method="post">
                <?php
                $query = new select();
                $cadena = "select scrl.num_s,scrl.sucursal from sucursal as scrl";
                $reg = $query->seleccionar($cadena);

                echo "<div class='mb-3'>
                    <label class='control-label'><h5>Sucursal</h5></label>
                    <select name='usr' class='form-select'>
                    ";
                foreach ($reg as $value) {
                    echo"<option value='".$value->num_s."'>".$value->sucursal."</option>";
                }
                echo "</select>
                    </div>";
                ?>
                <div class="row">
                    <div class="col-6">
                        <label for="date1">Entre fecha</label>
                        <input type="date" name="date1" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label for="dat2">Y Fecha</label>
                        <input type="date" name="date2" class="form-control" required>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success col-12">Buscar Historial por Sucursal</button>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container">
    <?php
    if ($_POST){
        extract($_POST);
        $query = new select();
        $cadena2 = "select cons.sucursal,cnlt.dueno,vet.veterinario,cnlt.mascota,cons.consulta,cons.servicio,cons.fecha_consulta  from  
        (select mscts.m_id,concat('Dueno: ',concat(prsn_cl.nombre,' ',prsn_cl.apellido),'  Telefono: ',cntc.numero) as dueno
        ,concat('Mascota: ',mscts.nombre,'   Raza: ',mscts.raza,'   Sexo: ',mscts.sexo,'  Especie: ',espcs.especie) as mascota 
        from persona as prsn_cl inner join usuarios as usr_cl on prsn_cl.p_id=usr_cl.persona inner join mascotas as mscts 
        on usr_cl.u_id=mscts.usuario inner join especies as espcs on espcs.e_id=mscts.especie inner join contacto as cntc on cntc.persona=prsn_cl.p_id) as cnlt
        inner join (select cnslts.mascota,cnslts.veterinario,cnslts.fecha_consulta,concat('Peso: ',cnslts.peso,'   Temperatura: ',cnslts.temperatura,'   Sintomas: ',cnslts.sintomas,
        '   Operado: ',cnslts.operado,'   Medicamentos: ',cnslts.medicamentos,'  Prescripcion: ',cnslts.prescripcion) as consulta,group_concat(serv.servicio) as servicio 
        , scrsl.sucursal,scrsl.num_s
        from consultas as cnslts inner join con_serv on con_serv.consulta=cnslts.cons_id inner join sucursal as
        scrsl on cnslts.sucursal=scrsl.num_s inner join servicios as serv on serv.s_id=con_serv.servicio group by consulta) as cons on cons.mascota=cnlt.m_id inner join 
        (select vet.v_id,concat('Veterinario:',concat(prsn.nombre,' ',prsn.apellido),'   Cedula:',vet.cedula) as veterinario from persona as prsn 
        inner join veterinarios as vet on vet.persona=prsn.p_id) as vet on vet.v_id=cons.veterinario 
        where cons.num_s='$usr' and cons.fecha_consulta between '$date2' and '$date2' order by cons.fecha_consulta desc;";
        $dato = $query->seleccionar($cadena2);
        foreach ($dato as $item){
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
                        <li class='list-group-item'>$item->mascota</li>
                        <li class='list-group-item'>$item->consulta</li>
                        <li class='list-group-item'>Servicios: $item->servicio</li>
                        <li class='list-group-item'>$item->fecha_consulta</li>
                      </ul>
                    </div>
                    <div class='card-footer'>
                    </div>
                </div><div class='progress'>
                    <div class='progress-bar progress-bar-striped progress-bar-animated bg-danger' 
                    aria-label='Animated striped example'  style='width: 100%'>
                </div></div>
                </div><br>
            ";
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
