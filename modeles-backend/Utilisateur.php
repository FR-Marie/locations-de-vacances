<?php
//Appel du fichier Database.php
require_once "modeles-backend/Database.php";

//La classe utilisateur herite de la classe Mere Database
class Utilisateurs extends Database {
    /**
     * @var string
     */
    private $mail_utilisateur;
    /**
     * @var string
     */
    private $mdp_utilisateur;
    /**
     * @var string
     */
    private $repeatPassword;

    ////////////////INSCRIRE UN UTILISATEUR POUR RESERVER UN GITE ET ECRIRE UN COMMENTAIRES//////////////
    public function inscriptionUtilisateur()
    {

    }

    //////////////////////CONNECTER UN UTILISTEUR//////////////////////////////////
    public function connexionUtilisateur()
    {
        //Connexion a la base de données a l'aide de l'instance de la classe mere (database) heritage
        //Et appel de sa methode public getPDO()
        $db = $this->getPDO();


//Verifie si utilisateurs est deja connecté
//Verification des champs du formulaire
//Verification des champ du formulaire
//Si le champ existe et n'est pas vide
//Dans le DOM un utilisateur peut supprimer attribut required des inputs => donc on check que c pas vide

        if (isset($_POST["mail_utilisateur"]) && !empty($_POST["mail_utilisateur"]) && isset($_POST["mdp_utilisateur"]) && !empty($_POST["mdp_utilisateur"])) {
            //On sanitize = desinfecter les champs //trim supprimer les espaces en debut et fin de chaine de caractère
            //htmlspecialchar transforme les caractère spéciaux en chaine de caracteres //faille xss => ex: <script>js malvaillant</script>
            $this->mail_utilisateur = trim(htmlspecialchars($_POST['mail_utilisateur']));
            $this->mdp_utilisateur = trim(htmlspecialchars($_POST['mdp_utilisateur']));

            $sql = "SELECT * FROM utilisateurs WHERE mail_utilisateur = ? AND mdp_utilisateur = ?";

            //Requète préparée
            $connexionUtilisateur = $db->prepare($sql);

            //Bind des paramètre (on lie les champs du formulaire aux paramètre de la requète SQL)
            $connexionUtilisateur->bindParam(1, $this->mail_utilisateur);
            $connexionUtilisateur->bindParam(2, $this->mdp_utilisateur);

            //Attention ici 2 paramètres a liés
            $connexionUtilisateur->execute();

            //parcours de la table Utilisateur PhpMyAdmin
            if ($connexionUtilisateur->rowCount() >= 1) {
                //Creer une variable qui liste (recherche) tous les elements
                //Mais retourne un tableau associatif avec 1 seul résultat
                $row = $connexionUtilisateur->fetch(PDO::FETCH_ASSOC);

                //Si la prorpriété privée $email_user ($_POST['email_user']) est = a la données email de la table Utilisateurs ET

                //Si la prorpriété privée $password_user ($_POST['password_user']) est = a la données email de la table Utilisateurs

                if ($this->mail_utilisateur === $row["mail_utilisateur"] && $this->mdp_utilisateur === $row["mdp_utilisateur"]) {
                    //On demarre une seesion
                    session_start();

                    //Variable super globale de SESSION: booléen si connexion ET email
                    //Ces éléments sont utilisés dans le routeur + la navbar pour afficher le PRENOM de l'utilisateur connecté
                    $_SESSION["utilisateur_connecte"] = true;
                    $_SESSION["prenom_utilisateur"] = $row["prenom_utilisateur"];


                    header("Location: accueil");
                }else{
                    ?>
                    <div>
                        <p class='alert-danger p-3 text-center w-50 m-auto'>Aucun utilisateur ne possède ces identifiants</p>
                    </div>
                    <?php
                }
                }else{
                    ?>
                    <div>
                        <p id='' class='alert-danger p-3 text-center w-50 m-auto'>Identifiants incorrects</p>
                    </div>
                    <?php
                }
                }else{
                    ?>
                    <div>
                        <p class='alert-danger p-3 text-center w-50 m-auto'>Merci remplir tous les champs</p>
                    </div>
                    <?php
                }
//////////////////////////
    }

}


