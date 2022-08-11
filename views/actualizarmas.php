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
<br><br><br><br>
<!--Contenidos-->
<div class="container text-center">
    <?php
    $h = $_GET['id'];
    $query = new select();
    $cadena1 = "select nombre from mascotas where m_id = '$h'";
    $reg1 = $query->seleccionar($cadena1);
    foreach ($reg1 as $item){
        echo "<h1 class='bg-primary blanco rounded-pill'>Modificando datos de: $item->nombre</h1>";
    }
    ?>
</div>

<div class="container">
<?php
    $idm = $_GET['id'];

    $query = new select();
    $cadena2 = "select * from mascotas where m_id = '$idm'";
    $dato = $query->seleccionar($cadena2);
    foreach ($dato as $item){
        echo"
<form action='scripts/actualizarmascota.php' method='post'>
        <div class='container'>
        <div class='card'>
            <div class='card-header bg-info text-center'>
                <h3>Datos disponibles a Modificar</h3>
            </div>
            <div class='card-body '>
                <label for='Raza'>Raza</label>
                <input type='text' name='raza' id='Raza' value='$item->raza' class='form-control'>
                <label for='Rasgos'>Rasgos</label>
                <input type='text' name='rasgos' id='Rasgos' value='$item->rasgos' class='form-control'>
                <input type='number' name='id' class='visually-hidden' value='$idm'>
            </div>
            <div class='card-footer'>
            <button type='submit' class='btn btn-success btn-lg'>Guardar Cambios</button>
            </div>
        </div><div class='progress'>
            <div class='progress-bar progress-bar-striped progress-bar-animated bg-info' aria-label='Animated striped example'  style='width: 100%''>
        </div>
        </div><br>
</form>
";}
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
                <button type="button" class="btn btn-danger blanco" >
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