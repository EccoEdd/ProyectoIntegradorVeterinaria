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
    require_once("../../vendor/autoload.php");

    $insertp = new inseruser();
    extract($_POST);
        $nu = "INSERT INTO especialidad(especialidad) values ('$nom')";
        $insertp->inseruser($nu);
        echo "<div  class='rabbit'></div><div class='clouds'></div>";
        header("refresh:3;../veteridueno.php");
    ?>
</body>
</html>