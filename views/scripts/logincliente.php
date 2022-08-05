<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/rabbitcharge.css">
    <script src="../../js/bootstrap.min.js"></script>
    <link rel="icon" href="../../images/icon.png">
    <title>RegVet</title>
</head>
<body>
    <?php
    session_start();
    use Vet\query\select;
    require_once("../../vendor/autoload.php");

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $_SESSION['usuario']=$usuario;

    $query = new select();
    $cadena ="select * from persona where correo='$usuario' and contrasena='$contrasena'";
    $datos = $query->seleccionar($cadena);

    //echo $datos->rowCount();

    //$filas=
    //if ($datos->rowCount()){
    //    return true;
    //}

    //if ($sql = $datos->fetch_object()){
    //    header("refresh:3;../cliente.php");
    //}else{
    //    echo "<h1>Error en inicio de Secion</h1>";
    //};



    //echo $usuario."<br>";
    //echo $contrasena;


    echo "<div  class='rabbit'></div><div class='clouds'></div>";


    ?>
</body>
</html>