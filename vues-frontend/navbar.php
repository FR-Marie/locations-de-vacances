<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="assets/img/technique(structure)/logoperso.png" class="w-75 mb-3 ms-2"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mb-5">
                    <a class="nav-link active" aria-current="page" href="accueil">ACCUEIL</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="rechercher">RECHERCHER</a>
                </li>

                <?php
                if (isset($_SESSION["utilisateur_connecte"]) && ($_SESSION["utilisateur_connecte"] === true)){
                    ?>
                    <li id="bonjourConnecte">
                        <a class="nav-link text-warning">Bonjour <?= $_SESSION["prenom_utilisateur"]?></a>
                    </li>
                    <?php
                }elseif (isset($_SESSION["administrateur_connecte"]) && ($_SESSION["administrateur_connecte"] === true)){
                    ?>
                    <li>
                        <a href="administration" class="nav-link text-danger">ADMINISTRATION</a>
                    </li>
                    <li id="bonjourConnecte">
                        <a class="nav-link text-danger">Bonjour <?= $_SESSION["prenom_administrateur"]?></a>
                    </li>
                    <?php
                }
                ?>

            </ul>


            <div class="me-5 mb-3 text-end">


                <div>
                    <?php
                    if (isset($_SESSION["utilisateur_connecte"]) && ($_SESSION["utilisateur_connecte"] === true) ||
                        isset($_SESSION["administrateur_connecte"]) && ($_SESSION["administrateur_connecte"] === true)){
                        ?>
                    <form action="deconnexion" method="POST">
                        <button type="submit" name="btn-deconnexion" id="btn-deconnexion" class="btn btn-sm btn-outline-light mb-2">Déconnexion</button>
                    </form>
                        <?php
                    }else{
                        ?>
                        <a href="connexion" id="btn-connexion" class="btn btn-sm btn-outline-light mb-2">Connexion</a>
                        <?php
                    }
                    ?>
                    <!----------------------------->

                    <!----------------------------->

                </div>
                <div>
                    <a href="inscription" id="btn-inscription" class="btn btn-sm btn-outline-light">Inscription</a>
                </div>


            </div>

        </div>
    </div>
</nav>
