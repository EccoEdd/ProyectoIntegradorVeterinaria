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
                            <button type="button" class="btn">
                                <a class="nav-link" href="cliente.php">Regresar a mascotas</a>
                            </button>
                        </li>
                        <li class="nav-item sm-12 lg-6">
                            <button type="submit" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#perfil">
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
    use Vet\query\select;
    require_once("../vendor/autoload.php");
    extract($_POST);
    $query = new select();

    $cadena1 = "select nombre from mascotas where m_id = '$mid'";
    $reg1 = $query->seleccionar($cadena1);
    foreach ($reg1 as $item){
        echo "<h1 class='bg-primary blanco'>Historial Medico de: $item->nombre</h1>";
    }
    ?>
</div>

<div class="container">

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
                $query = new select();
                $cadena1 = "select nombre, apellido, correo from persona where correo = 'ibeahana@digg.com'";
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
                    Cerrar Sesion
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
                $cadena2 = "select numero, descripcion from contacto as c join persona as p on c.persona = p.p_id where p.correo = 'ibeahana@digg.com'";
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
                <form action="scripts/telefono1.php" method="post">
                    <div class="mb-3">
                        <label for="tel" class="form-label">Telefono</label>
                        <input type="number" class="form-control"  required name="tel" placeholder="Ej: 1112223334">
                        <label for="Descripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control"  required name="des" placeholder="Ej: Fijo">
                        <?php
                        $query = new select();
                        $iduser = "select p_id from persona where correo = 'ibeahana@digg.com'";
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