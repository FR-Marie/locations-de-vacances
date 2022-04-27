<?php
require_once "modeles-backend/Database.php";


class Locations extends Database {

    private $nom_location;

    //les données de la table "locations"
    public function getLocations(){

        //connexion PDO grâce à Database.php
        $db = $this->getPDO();
        $sql = "SELECT * FROM locations";

        $locations = $db->query($sql);

        return $locations;

    }


}
