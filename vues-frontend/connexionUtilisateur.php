<?php
//Appel des fichier des 2 classes
require_once "modeles-backend/Utilisateur.php";
//Instance de la classe Admin
$utilisateurClasse = new Utilisateurs();
?>



<div id="form-user">


            <h2 class="text-center mb-5">CONNEXION A VOTRE ESPACE CLIENT</h2>

            <form method="post" id="form-connexion">

                <div class="form-group mb-4 w-25 m-auto">
                    <label for="email_user">Votre adresse email:</label>
                    <input type="email" name="mail_utilisateur" class="form-control" id="email_user" placeholder="Email">
                </div>
                <div class="form-group mb-4 w-25 m-auto">
                    <label for="mdp_utilisateur">Votre mot de passe:</label>
                    <input type="password" name="mdp_utilisateur" class="form-control" id="password_user" placeholder="Mot de passe">
                </div>


                <!--Ce bouton est recup via son attribut name et methode post $_POST['btn_valid_user']-->
                <div class="text-center mb-3">
                    <button name="btn_connexion_utilisateur" type="submit" class="btn btn-secondary">CONNEXION</button>
                    <a href="connexion" id="btn-retour" class="btn btn-secondary btn-sm">Retour</a>
                </div>


                <div class="text-center">
                    <a id="LienPasEncoreInscrit" href="inscription">Pas encore inscrit? Créer mon compte!</a>
                </div>
                <div class="text-center">
                    <a id="LienMotDePasseOublie" href="inscription">Mot de passe oublié?</a>
                </div>

            </form>



        <?php
        //Au clic on appel la methode de connexion de la classe Utilisateur
        if(isset($_POST['btn_connexion_utilisateur'])){
            $utilisateurClasse->connexionUtilisateur();
        }


    ?>
</div>