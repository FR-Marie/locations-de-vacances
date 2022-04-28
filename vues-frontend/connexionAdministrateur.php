<?php
//Appel des fichier des 2 classes
require_once "modeles-backend/Administrateur.php";
//Instance de la classe Admin
$administrateurClasse = new Administrateurs();
?>



<div id="form-user">
    <?php
    //Sin on est connecter en tant qu'utilisateur = on redirige vers la page d'accueil
    if(isset($_SESSION['administrateur_connecte']) && $_SESSION['prenom_administrateur'] === true){
        header("Location: administration");
    }else{
        //Sinon on affiche le formulaire USER
        ?>

        <h2 class="text-center mb-5">CONNEXION A L'ESPACE ADMINISTRATEUR</h2>

        <form method="post" id="form-connexion">

            <div class="form-group mb-4 w-25 m-auto">
                <label for="mail_administrateur">Votre adresse email:</label>
                <input type="email" name="mail_administrateur" class="form-control" id="email_user" placeholder="Email">
            </div>
            <div class="form-group mb-4 w-25 m-auto">
                <label for="mdp_administrateur">Votre mot de passe:</label>
                <input type="password" name="mdp_administrateur" class="form-control" id="password_user" placeholder="Mot de passe">
            </div>


            <!--Ce bouton est recup via son attribut name et methode post $_POST['btn_valid_user']-->
            <div class="text-center mb-3">
                <button name="btn_connexion_administrateur" type="submit" class="btn btn-secondary">CONNEXION</button>
                <a href="connexion" id="btn-retour" class="btn btn-secondary btn-sm">Retour</a>
            </div>


            <div class="text-center">
                <a id="LienMotDePasseOublie" href="inscription">Mot de passe oublié?</a>
            </div>

        </form>



        <?php
        //Au clic on appel la methode de connexion de la classe Utilisateur
        if(isset($_POST['btn_connexion_administrateur'])){
            $administrateurClasse->connexionAdministrateur();
        }

    }
    ?>
</div>