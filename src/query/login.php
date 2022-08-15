<?php
namespace  Vet\Query;

use PDO;
use Vet\data\database;
use PDOException;

class login{
    public function verificaLogin($correo, $contra){
        try{
            $pase = null;

            $cc = new database("empresa", "root", "root");
            $objetoPDO = $cc->getPDO();

            $query = "select correo, contrasena, rol from persona where correo = '$correo'";
            $consulta = $objetoPDO->query($query);


            while($renglon = $consulta->fetch(PDO::FETCH_ASSOC)){
                if(password_verify($contra,$renglon['contrasena'])){
                    $pase = true;
                }
            }
            echo "<div  class='rabbit'></div><div class='clouds'></div>";
            if($pase==true){
                session_start();
                $usrol = new select();
                $cadena = "select rol from persona where correo = '$correo'";
                $busca = $usrol->seleccionar($cadena);
                foreach ($busca as $item){
                    $rol = $item->rol;
                }
                $_SESSION["correo"] = $correo;
                $_SESSION["rol"] = $rol;
                switch ($rol){
                    case 'u':
                        header("refresh:2; ../../views/cliente.php");
                        break;
                    case 'v' || 'd':
                        header("refresh:2; ../../views/veteridueno.php");
                        break;
                }
            }else{
                echo "<h2 align='center'>Usuario o Password Incorrecto</h2>";
                header("refresh:2;../../index.php");
            }
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function cerrarLogin(){
        session_start();
        session_destroy();
    }
}