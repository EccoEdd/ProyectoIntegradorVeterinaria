<?php

namespace Vet\data;
use PDO;
use PDOException;

class database{
    public $objetoPDO = null;
    public $user ="root";
    public $password = "root";
    public $database = "veterinaria";

    public function __construct(string $database, string $user, string $password){
        $this->$database = $database;
        $this->$user = $user;
        $this->$password = $password;
    } 
    
    public function getPDO()
    {
        try{
            $host = "mysql:host=localhost;dbname=$this->database";
            $objetoPDO = new PDO($host, $this->user, $this->password);
            return $objetoPDO;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            echo "<h1> Aun no </h1>";
        }
    }   
    
    public function desconectar(){
        $objetoPDO = null;
    }
}