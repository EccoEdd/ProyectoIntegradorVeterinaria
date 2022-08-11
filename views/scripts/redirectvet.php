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
require_once("../../vendor/autoload.php");

echo "<div  class='rabbit'></div><div class='clouds'></div>";
echo "<h2>Redireccionando</h2>";
header("refresh:2;../veteridueno.php");

?>
</body>
</html>