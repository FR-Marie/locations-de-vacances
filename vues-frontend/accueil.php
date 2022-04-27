<?php
require_once "modeles-backend/Locations.php";

//Instance de la classe Gites = copie de la classe stockée dans une variable
$locationsClasse = new Locations();

$locations = $locationsClasse->getLocations();
//var_dump($locations);

?>
<div class="row">
    <?php
    foreach ($locations as $location) {
        ?>
        <div class="col-md-3 col-sm-12">

            <div class="card mb-4 text-center">

                <div class="card-header"><h4><?= $location["nom_location"] ?></h4></div>

                <div class="card-body h-100">
                    <img class="img-fluid" src="<?= $location["photo_location"]?>">

                    <!-----------localisation & surface------------>
                    <div class="d-flex justify-content-between mt-1">
                        <h5 class="card-text"><?=$location["ville_location"]?></h5>
                        <h5 class="card-text"><?=$location["surface_location"] ."m²"?></h5>
                    </div>

                    <!-----------tarifs------------>
                    <div class="text-start mt-2">
                        <span class="card-text d-block"><?=$location["prix_we_location"] ."€/week-end"?></span>
                        <span class="card-text"><?=$location["prix_semaine_location"] ."€/semaine"?></span>
                    </div>


                </div>

            </div>

        </div>

        <?php
    }
    ?>
</div>



