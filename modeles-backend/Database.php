<?php

class Database{

    private $host = "localhost";
    private $dbname = "locations_de_vacances";
    private $user = "root";
    private $pass = "";

    public function getPDO(){
        try {

            $db = new PDO('mysql:host='.$this->host.";dbname=".$this->dbname.";charset=UTF8", $this->user, $this->pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "connexion PDO valide";

        }catch (PDOException $exception){
            //echo "Echec connexion à PDO " .$exception->getMessage();
        }

        return $db;
    }




}
