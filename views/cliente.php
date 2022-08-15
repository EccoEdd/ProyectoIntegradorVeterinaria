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
                            <button type="submit" class="btn col-10" data-bs-toggle="modal" data-bs-target="#agregarmascota">
                                <a class="nav-link" href="#">Quiero Agregar Mascota</a>
                            </button>
                        </li>
                        <li class="nav-item sm-12 lg-6">
                            <button type="submit" class="btn btn-info offset-2" data-bs-toggle="modal" data-bs-target="#perfil">
                                <a class="nav-link blanco" href="#">Quiero ver Mi Perfil</a>
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
    <h1 class="bg-primary blanco rounded-pill">Mis Mascotas</h1>
</div>
<div class="container">
    <div class="container">
    <?php
    $correo = $_SESSION['correo'];
    $query = new select();
    $cadena = "select mscts.nombre, mscts.color,mscts.sexo,espcs.especie, mscts.m_id, mscts.raza, mscts.rasgos
    from persona as prsn inner join usuarios as usr on prsn.p_id=usr.persona inner join mascotas as mscts on mscts.usuario=usr.u_id inner join especies as espcs
    on mscts.especie=espcs.e_id where prsn.correo = '$correo'";
    $reg = $query->seleccionar($cadena);

    foreach ($reg as $dato){
        echo "
            <div class='card'>
            <div class='card-header bg-info text-center'>
                <h3>$dato->nombre</h3>
            </div>
            <div class='card-body text-center'>
            <h5 class='card-title'>Datos</h5>
            <ul class='list-group list-group-flush'>
            <li class='list-group-item'>Color: $dato->color</li>
            <li class='list-group-item'>Especie: $dato->especie</li>
            <li class='list-group-item'>Raza: $dato->raza</li>
            <li class='list-group-item'>Sexo: $dato->sexo</li>
            <li class='list-group-item'>Rasgos: $dato->rasgos</li>
            </ul>
            </div>
            <div class='card-footer'>
                <a type='button' class='btn btn-primary btn-lg' href='historial.php?id=$dato->m_id'>Historial</a>
                <a type='button' class='btn btn-success btn-lg' href='actualizarmas.php?id=$dato->m_id'>Modificar Registro</a>
            </div>
        </div><div class='progress'>
        <div class='progress-bar progress-bar-striped progress-bar-animated bg-info' aria-label='Animated striped example'  style='width: 100%''>
        </div>
    </div><br>
    ";
    }
    ?>
    </div>
</div>
<br>

<!--Modals-->
<!--Agregar Mascota-->
<div class="modal fade" tabindex="-1" id="agregarmascota">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Mascota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="scripts/nuevamascota.php" method="post">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nombre</label>
                        <input type="text" class="form-control"  required name="nom" placeholder="Ej: Estrella">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control"  required name="color" placeholder="Ej: Blanco">
                    </div>

                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza</label>
                        <input type="text" class="form-control" required name="raza" placeholder="Ej:Chihuahua">
                    </div>
                    <div class="mb-3">
                        <label for="rasgos" class="form-label">Rasgos</label>
                        <input type="text" class="form-control"  required name="rasgos" placeholder="Ej: Tiene un tic nervioso">
                    </div>
                    <div class="mb-3">
                        Sexo <br>
                        <input type="radio" class="form-check-input" name="sexo" value="Macho" required>Macho
                        <input type="radio" class="form-check-input" name="sexo" value="Hembra" required>Hembra<br>
                    </div>
                    <div class="mb-3">
                        <?php
                        $query = new select();
                        $cadena3 = "select e_id, especie from especies";
                        $cadena4 = "select u_id from usuarios as u join persona as p 
                        on p.p_id = u.persona where p.correo = '$correo'";
                        $reg = $query->seleccionar($cadena3);
                        $reg3 = $query->seleccionar($cadena4);
                        echo "<div class='mb-3'>
                            <label class='control-label'>Especie</label>
                            <select name='especie' class='form-select'>
                        ";
                        foreach ($reg as $value) {
                            echo"<option value='$value->e_id'>$value->especie</option>";
                        }
                        echo "</select></div>";
                        foreach ($reg3 as $u){
                            echo"<input type='number' class='visually-hidden'  required name='usuario' value='$u->u_id'>";
                        }
                        ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
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
                <button type="submit" class="btn btn-info blanco" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#agregartelefono">
                    Agregar Telefono
                </button>
                <button type="submit" class="btn btn-danger blanco" data-bs-toggle="modal" data-bs-target="#">
                    <a href="scripts/cerrarsecion.php" class="blanco nada" style="text-decoration: none">Cerrar Sesion</a>
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

<!--Agregar telefono-->
<div class="modal fade" tabindex="-1" id="agregartelefono">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Telefono</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="scripts/telefono.php" method="post">
                    <div class="mb-3">
                        <label for="tel" class="form-label">Telefono</label>
                        <input type="number" class="form-control"  required name="tel" placeholder="Ej: 1112223334">
                        <label for="Descripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control"  required name="des" placeholder="Ej: Fijo">
                        <?php
                        $query = new select();
                        $iduser = "select p_id from persona where correo = '$correo'";
                        $idu = $query->seleccionar($iduser);
                        foreach ($idu as $id){
                            echo "<input type='number' class='visually-hidden' value='$id->p_id' name='id'>";
                        }
                        ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
<?php
break;
case 'v' || 'd':
    header("refresh:0; scripts/redirectvet.php");
    break;
}
} else {
    header("refresh:0; scripts/redirectindex.php");
}
?>