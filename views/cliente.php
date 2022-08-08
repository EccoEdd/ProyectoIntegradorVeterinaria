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
                            <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#agregarmascota">
                                <a class="nav-link" href="#">Agregar Mascota</a>
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
    <h1 class="bg-primary blanco">Mis Mascotas</h1>
</div>

<div class="container">
    <?php
    use Vet\query\select;
    require_once("../vendor/autoload.php");

    $query = new select();
    $cadena = "select mscts.nombre, mscts.color,mscts.sexo,espcs.especie, mscts.m_id
    from persona as prsn inner join usuarios as usr on prsn.p_id=usr.persona inner join mascotas as mscts on mscts.usuario=usr.u_id inner join especies as espcs
    on mscts.especie=espcs.e_id where prsn.correo = 'ibeahana@digg.com'";
    $reg = $query->seleccionar($cadena);

    foreach ($reg as $dato){
        echo "
            <div class='card'>
            <div class='card-header bg-info text-center'>
                <h3>$dato->nombre</h3>
            </div>
            <div class='card-body text-center'>
                <h5 class='card-title'>Datos</h5>
                <p class='card-text'>Color: $dato->color</p>
                <p class='card-text'>Sexo: $dato->sexo</p>
                <p class='card-text'>Raza: $dato->especie</p>
            </div>
            <div class='card-footer'>
                <form action='' method='post'>
                <input type='text' class='visually-hidden' required name='m_id' value='$dato->m_id'>
                <a href='#' class='btn btn-primary btn-lg'>Historial</a>
                </form>
            </div>
        </div><br>
    ";
    }
    ?>

</div>

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
                <form action="views/scripts/nuevousuario.php" method="post">
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control"  required name="nom" placeholder="Ej: Estrella">
                    </div>
                    <div class="mb-3">
                        <label for="Apellidos" class="form-label">Color</label>
                        <input type="text" class="form-control"  required name="color" placeholder="Ej: Blanco">
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Raza</label>
                        <input type="text" class="form-control" required name="raza" placeholder="Ej: ">
                    </div>
                    <div class="mb-3">
                        <label for="Apellidos" class="form-label">Rasgos</label>
                        <input type="text" class="form-control"  required name="rasgos" placeholder="Ej: ">
                    </div>
                    <div class="mb-3">
                        Sexo <br>
                        <input type="radio" class="form-check-input" name="sexo" value="h">Macho
                        <input type="radio" class="form-check-input" name="sexo" value="m">Hembra<br>
                    </div>
                    <div class="mb-3">
                        <label for="Apellidos" class="form-label">Especie</label>
                        <input type="text" class="form-control"  required name="color" placeholder="Ej: ">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
                echo "<h2>Nombre de Usuario</h2>";

                ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#agregartelefono">
                    <a class="nav-link blanco" href="#">Agregar Telefono</a>
                </button>
                <button type="submit" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#">
                    <a class="nav-link blanco" href="#">Cerrar Sesion</a>
                </button>
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
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control"  required name="tel" placeholder="Telefono">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>