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
    $inseres = new inseruser();
    $checkbox=1;
    extract($_POST);
    $password = password_hash($_POST['contra'], PASSWORD_DEFAULT);
        $nper = "INSERT into persona(nombre, apellido, correo, contrasena,rol)
                values('$nom','$ape','$corr','$password','$rol')";

        $insertp->inseruser($nper);

        $query = new Select();
        $cadena = "SELECT persona.p_id from persona where persona.correo='$corr'";
        $tabla = $query->seleccionar($cadena);
        
        foreach($tabla as $id){
        $nu = "INSERT INTO veterinarios(persona,cedula, condicion)  
        values ('$id->p_id','$cedu', 'activo')";
        $insertu->inseruser($nu);}

        $queryd = new Select();
        $cadenad = "SELECT veterinarios.v_id from veterinarios where veterinarios.cedula=$cedu";
        $tablad = $queryd->seleccionar($cadenad);
        if($checkbox!=1){
        foreach($tablad as $id_v){
        $checkbox=$_POST['checkbox'];
        foreach($checkbox as $valor){
        $cadena ="INSERT INTO vet_esp(veterinarios,especialidades)  
        values ($id_v->v_id,'$valor')";
        $inseres->inseruser($cadena);}}}
        
        echo "<div  class='rabbit'></div><div class='clouds'></div>";
        header("refresh:3;../veteridueno.php");

    
?>
</body>
</html>