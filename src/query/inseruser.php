<?php

namespace Vet\query{
    use PDO;
    use PDOException;
    use Vet\data\database;

    class inseruser{
        public function inseruser($qry){
            try {
                $con = new database("veterinaria", "root","root");
                $objetoPDO = $con->getPDO();
                $objetoPDO->query($qry);
                $con->desconectar();
            }
            catch (PDOException $e){
                //echo $e->getMessage();
                echo "<div  class='rabbit'></div><div class='clouds'></div><h1>Intentelo de nuevo</h1>";
                header("refresh:4;../../index.php");
            }
        }
    }
}