<?php
//Appel du fichier de la classe de connexion Database.php
require_once "modeles-backend/Database.php";

//Class Adminstration  herite de la classe Database a l'aide du mot cle extends
//Un classe php n'herite que d'une seule autre classes
//Ici on peu dire que Database est la classe parente et Administration est une classe enfant
//Dans la classe Database si on passe les propriétés de connexion en protected => elles seront accessible dans Administration enfant

class Administrateurs extends Database
{
    //Les propriétées = variables dans une classe
    //POUR LES ADMINS
    /**
     * @var string
     */
    private $mail_administrateur;
    /**
     * @var string
     */
    private $mdp_administrateur;

    //Connexion a la base de données a l'aide de l'instance de la classe mere (database)
    //Et appel de sa methode public getPDO() stocké dans la variable $db

    public function connexionAdministrateur(){
        //Connexion a la base de données a l'aide de l'instance de la classe mere (database)
        //Et appel de sa methode public getPDO() stocké dans la variable $db

        $db = $this->getPDO();

        //Verification des champs du formulaire
        //Si le champ existe et ne sont pas vide => on continue
        //Dans le DOM un utilisateur peut supprimer attribut required des inputs => donc : on check que c pas vide

        if(isset($_POST["mail_administrateur"]) && !empty($_POST["mail_administrateur"]) && (isset($_POST["mdp_administrateur"]) && !empty($_POST["mdp_administrateur"]))){
            //On sanitize = desinfecter les champs
            //trim supprimer les espaces en debut et fin de chaine de caractère
            //htmlspecialchar transforme les caractère spéciaux en chaine de charactères
            //faille xss => ex: <script>js malvaillant</script>
            //Pour acceder a une variable on utilise $this (sort de la methode et accèse a une propriété)
            //Cette methode permet de stcoker la valeur de $_POST dans une propriétée privée pour +  de securité
            $this->mail_administrateur = trim(htmlspecialchars(strip_tags($_POST["mail_administrateur"])));
            $this->mdp_administrateur = trim(htmlspecialchars(strip_tags($_POST["mdp_administrateur"])));

            //Requète de connexion
            $sql = "SELECT * FROM admins WHERE mail_administrateur = ? AND mdp_administrateur = ?";

            //Requète préparée
            $stmt = $db->prepare($sql);

            //Bind des paramètres

            $stmt->bindParam(1, $this->mail_administrateur);
            $stmt->bindParam(2, $this->mdp_administrateur);
            //Attention ici 2 paramètres a liés
            //On execute la requète et on retourne un tableau associatif
            $stmt->execute();

            //On compte les entrées retorunée par execute(tableau associatif)
            //Si on a au moin un admin
            if($stmt->rowCount() >= 1){
                //Creer une variable qui liste (recherche) tous les elements
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if($this->mail_administrateur === $row["mail_administrateur"] && $this->mdp_administrateur === $row["mdp_administrateur"]){
                    //Demarre la seesion
                    session_start();
                    //Booléen pour verifié si on est connecté
                    $_SESSION["administrateur_connecte"] = true;
                    $_SESSION["prenom_administrateur"] = $row["prenom_administrateur"];
                    //La redirection
                    header('Location: administration');
                }else{
                    ?>
                    <div>
                        <p class='alert-danger p-3 text-center w-50 m-auto'>Aucun admin ne possède ces identifiants</p>
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
    }
}