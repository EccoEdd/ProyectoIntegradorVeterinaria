<?php

namespace Vet\query;
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
            echo $e->getMessage();
        }
    }
}