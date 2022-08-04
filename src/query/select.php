<?php

namespace Vet\query{

    use PDO;
    use PDOException;
    use Vet\data\database;

    class select{
        public function seleccionar($qry){
            try{
                $cc = new database("veterinaria", "root", "root");
                $objetoPDO = $cc->getPDO();
                $resultado = $objetoPDO->query($qry);
                $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
                $cc->desconectar();
                return $fila;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                echo "<h1>Nope</h1>";
            }
        }
    }
}