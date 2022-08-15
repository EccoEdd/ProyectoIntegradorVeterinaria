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
    <h1 class="bg-primary rounded-pill blanco">Clientes</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="#" method="post">
                <?php
                //por sucursal
                $query = new select();
                $cadena = "select scrl.num_s,scrl.sucursal from sucursal as scrl";
                $reg = $query->seleccionar($cadena);

                echo "<div class='mb-3'>
                    <label class='control-label'><h5>Buscar por sucursal</h5></label>
                    <select name='sucu' class='form-select'>
                    ";
                foreach ($reg as $value) {
                    echo"<option value='".$value->num_s."'>".$value->sucursal."</option>";
                }
                echo "</select>
                    </div>";
                ?>
                <input type="text" class="visually-hidden" value="sucursal" name="tipo">
                <button type="submit" class="btn btn-success col-12">Buscar</button>
            </form>
        </div>
        <div class="col-6" >
            <form action="#" method="post">
                <label for="bus"><h5>Busqueda por nombre</h5></label>
                <input type="text" id="bus" name="nom" class="form-control">
                <input type="text" class="visually-hidden" value="nombre" name="tipo">
                <br>
                <button type="submit" class="btn btn-success col-12" style="margin-top: -7.3px">Buscar</button>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container">
    <?php
    if ($_POST) {
        extract($_POST);
        if ($tipo == 'sucursal'){
        $query = new select();
        $cadena2 = "select concat(prsn.nombre,' ',prsn.apellido) as usuario,cntct.numero,prsn.correo,group_concat(mscts.nombre) as mascota, scrsl.sucursal
from persona as prsn inner join usuarios as usrs on usrs.persona=prsn.p_id inner join mascotas as mscts on mscts.usuario=usrs.u_id inner join consultas
as cnslts on cnslts.mascota=mscts.m_id inner join sucursal as scrsl on cnslts.sucursal=scrsl.num_s inner join contacto as cntct on cntct.persona=prsn.p_id
where scrsl.num_s='$sucu' group by prsn.nombre";
        $dato = $query->seleccionar($cadena2);
        echo "
                <table class='table table-hover'>
                <thead class'table-dark'>
                <tr>
                <th>Nombre</th>
                <th>Telefonos</th>
                <th>Correo</th>
                <th>Mascotas</th>
                <th>Sucursal</th>
                </thead>
                </tbody>
            ";
        foreach ($dato as $registro) {
            echo "<tr>";
            echo "<td> $registro->usuario </td>";
            echo "<td> $registro->numero</td>";
            echo "<td> $registro->correo</td>";
            echo "<td> $registro->mascota</td>";
            echo "<td> $registro->sucursal</td>";
            echo "</tr>";
        }
        echo "</tbody>
                </table>";
        }else if ($tipo == 'nombre') {
        $query = new select();
        $cadena2 = "select concat(prsn.nombre,' ',prsn.apellido) as usuario,cntc.numero,prsn.correo,group_concat(msct.nombre) as mascota
from persona as prsn inner join usuarios as usrs on prsn.p_id=usrs.persona inner join mascotas as msct on msct.usuario=usrs.u_id 
inner join contacto as cntc on cntc.persona=prsn.p_id where prsn.nombre like '$nom' group by prsn.nombre
        ";
        $dato = $query->seleccionar($cadena2);
                    echo"
                <table class='table table-hover'>
                <thead class'table-dark'>
                <tr>
                <th>Nombre</th>
                <th>Telefonos</th>
                <th>Correo</th>
                <th>Mascotas</th>
                </thead>
                </tbody>
            ";
            foreach($dato as $registro){
                echo "<tr>";
                echo "<td> $registro->usuario </td>";
                echo "<td> $registro->numero</td>";
                echo "<td> $registro->correo</td>";
                echo "<td> $registro->mascota</td>";
                echo "</tr>";
            }
            echo"</tbody>
                </table>";
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