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
    use Vet\query\inseruser;
    use Vet\query\select;
    require_once("../../vendor/autoload.php");

    $insertp = new inseruser();
    $insertu = new inseruser();
    $suser = new select();

    extract($_POST);
    $password = password_hash($_POST['con'], PASSWORD_DEFAULT);
        echo $cor;
        $nper = "   insert into persona(nombre, apellido, correo, contrasena, rol)
                values('$nom','$ape','$cor','$password','u')";
        $insertp->inseruser($nper);

        $nu   = "insert into usuarios(persona) select p_id from persona as p where p.correo = '$cor'";
        $insertu->inseruser($nu);

        $user = "select p_id from persona as p where p.correo = '$cor'";
        $usr = $suser->seleccionar($user);
        foreach($usr as $id){
        $nu = "INSERT INTO contacto(numero, descripcion, persona)  
        values ('$num','$des','$id->p_id')";
        $insertu->inseruser($nu);
        }

        echo "<div  class='rabbit'></div><div class='clouds'></div>";
        header("refresh:3;../../index.php");

    ?>
</body>
</html>