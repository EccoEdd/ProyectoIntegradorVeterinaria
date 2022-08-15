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
    date_default_timezone_set('America/Mexico_City');
    $fecha=date("Y-m-d");
    $hora=date("H:i:s");
    extract($_POST);
        $nper = "INSERT into consultas(veterinario, mascota, fecha_consulta, hora_consulta,peso,temperatura, sintomas,operado, descripcion, sucursal, tipo_pago, monto_total, medicamentos, prescripcion)
                values('$veti','$mas','$fecha','$hora','$peso','$tem','$sinto','$op','$des','$sucu','$tipp','$mont','$med','$pres')";

        $insertp->inseruser($nper);

        $query = new Select();
        $cadena = "SELECT consultas.cons_id from consultas where consultas.fecha_consulta='$fecha' and consultas.hora_consulta='$hora'";
        $tabla = $query->seleccionar($cadena);
        foreach($tabla as $id_cons){
        $checkbox=$_POST['checkbox'];
        foreach($checkbox as $valor){
        $cadenap ="INSERT INTO con_serv(consulta,servicio)  
        values ('$id_cons->cons_id','$valor')";
        $insertu->inseruser($cadenap);}}
        
        echo "<div  class='rabbit'></div><div class='clouds'></div>";
        header("refresh:3;../veteridueno.php");
    
?>
</body>
</html>