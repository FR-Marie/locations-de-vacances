<?php
require_once "modeles-backend/Database.php";


class Locations extends Database {

    private $nom_location;

    //les données de la table "locations"
    public function getLocations(){

        //connexion PDO grâce à Database.php
        $db = $this->getPDO();
        $sql = "SELECT * FROM locations WHERE id_location = ?";
        $id_location = $_GET["id_location"];

        $request_location = $db->prepare($sql);
        $request_location = bindParam(1, $id_location);

        $request_location = execute();

        $location = $request_location->fetch();
    }

}

?>

<div>
    Bonjour
</div>


