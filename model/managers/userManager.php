<?php
require("./model/classes/User.class.php");


class UserManager
{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO; // assigner le pdo: on va mettre donner la valeur de parametre unPDO a l'attribut lePDO
    }


    public function getUserById($id)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM user WHERE idUser=:id_User ");
            $sql->bindParam(":id_User", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "User");
            $resultat = ($sql->fetch());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }



    public function getUserByEmail($email)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM User WHERE email=:email_User ");
            $sql->bindParam(":email_User", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "User");
            $leResultat = ($sql->fetch());
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }


    //chercher User par email et mdp

    public function getUserByEmailAndPassword($email, $password)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM user WHERE email=:email_User AND mdp=:mdp_User ");
            $sql->bindParam(":email_User", $email);
            $sql->bindParam(":mdp_User", $password);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "User");
            $leResultat = ($sql->fetch());
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    /**
     * Extraire tous les Users de la table User de la base de données
     * @Return Un array d'objets de la classe User 
     */

    public function getAllUsers()
    {

        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM User ORDER BY idUser");
            $sql->execute();
            $leResultat = ($sql->fetchAll(PDO::FETCH_CLASS, "User"));
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }




    //ajouter un User

    public function addUser(User $User)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("INSERT INTO user (pseudo,nom,prenom,email,mdp,adresse,cp,ville,tel) values(:pseudoUser,:nomUser,:prenomUser,:emailUser,:mdpUser,:adresseUser,:cp,:villeUser,:telUser)");

            $sql->bindValue(":nomUser", $User->getNom());
            $sql->bindValue(":prenomUser", $User->getPrenom());
            $sql->bindValue(":emailUser", $User->getEmail());
            $sql->bindValue(":mdpUser", $User->getMdp());
            $leResultat = $sql->execute();  
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    //modifier les informations d'un User
    /**
     * 
     */
    public function updateUser(User $User)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("UPDATE user set pseudo= :pseudoUser, nom=:nomUser, prenom=:prenomUser, email=:emailUser, mdp=:mdpUser,adresse=:adresseUser,cp=:codePostale, ville=:villeUser,tel=:telUser where idUser=:id_User ");

            $sql->bindValue(":id_User", $User->getIdUser());
            $sql->bindValue(":nomUser", $User->getNom());
            $sql->bindValue(":prenomUser", $User->getPrenom());
            $sql->bindValue(":emailUser", $User->getEmail());
            $sql->bindValue(":mdpUser", $User->getMdp());

            $leResultat = $sql->execute();  
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    
}
