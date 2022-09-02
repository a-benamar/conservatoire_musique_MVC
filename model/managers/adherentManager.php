<?php
require("model/classes/Adherent.class.php");

class AdherentManager
{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO; // assigner le pdo: on va mettre donner la valeur de parametre unPDO a l'attribut lePDO
    }

    /**
     * Undocumented function
     * methode qui permet de récuperer un adherent by id
     *
     * @param [type] $id
     * @return void
     */
    public function getAdherentById($id)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM adherent WHERE idAdherent=:id_Adherent ");
            $sql->bindParam(":id_Adherent", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Adherent");
            $resultat = ($sql->fetch());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    
/**
 * Undocumented getAllAdherent
 * methode qui permet de recuperer tous les adherents
 *
 * @return void
 */
    public function getAllAdherents()
    {

        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM adherent ORDER BY idAdherent");
            $sql->execute();
            $leResultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Adherent"));
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    
/**
 * Undocumented verifAdherent
 * methode permet de verifier si l'adherent est déja inscrit dans la bdd
 *
 * @param [type] $nom
 * @param [type] $prenom
 * @param [type] $mail
 * @param [type] $tel
 * @return $leResultat
 */
    public function verifAdherent($nom,$prenom,$mail,$tel)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM adherent WHERE nomAdherent=:nomAdherent AND  prenomAdherent=:prenomAdherent AND mailAdherent=:mailAdherent
              AND telAdherent=:telAdherent");
            $sql->bindParam(":nomAdherent", $nom);
            $sql->bindParam(":prenomAdherent", $prenom);
            $sql->bindParam(":mailAdherent", $mail);
            $sql->bindParam(":telAdherent", $tel);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Adherent");
            $leResultat = ($sql->fetch());
            return $leResultat;
     
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    /**
     * methode qui permet de recuperer last id  adherent inséré dans la base de données
     */
    
    public function selectAdherent($id)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT nomAdherent,prenomAdherent,mailAdherent,telAdherent
             FROM adherent WHERE idAdherent=:idAdherent");
              $sql->bindParam(":idAdherent", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Adherent");
            $leResultat = ($sql->fetch());
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

/**
 * methode permet d'ajouter un adherent
 */

    public function addAdherent(Adherent $adherent)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("INSERT INTO adherent (nomAdherent,prenomAdherent,mailAdherent,telAdherent) values(:nomAdherent,:prenomAdherent,:mailAdherent,:telAdherent)");

            $sql->bindValue(":nomAdherent", $adherent->getNomAdherent());
            $sql->bindValue(":prenomAdherent", $adherent->getPrenomAdherent());
            $sql->bindValue(":telAdherent", $adherent->getTelAdherent());
            $sql->bindValue(":mailAdherent", $adherent->getMailAdherent());            
            $leResultat = $sql->execute();  
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function getLastIdAdherent()
    {
        try {
            $connex = $this->lePDO;
            $lastIdAdherent =  $connex->lastInsertId(); 
            return $lastIdAdherent;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    
/**
 * methode pour update l'adherent
 */

    public function updateAdherent(Adherent $adherent)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("UPDATE adherent set nom=:nomAdherent, prenom=:prenomAdherent, mail=:mailAdherent, tel=:telAdherent where idAdherent=:id_Adherent ");

            $sql->bindValue(":nomAdherent", $adherent->getNomAdherent());
            $sql->bindValue(":prenomAdherent", $adherent->getPrenomAdherent());
            $sql->bindValue(":mailAdherent", $adherent->getMailAdherent());
            $sql->bindValue(":telAdherent", $adherent->getTelAdherent());      
            $leResultat = $sql->execute();  
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

/**
 * methode pour supprimer un adherent
 */

    public function deleteAdherentById($id)
    {
        try {
            $connex = $this->lePDO;
            $connex->beginTransaction();

            $sql = $connex->prepare("DELETE FROM inscription where idAdherent=:id_Adherent");
            $sql->bindParam(":id_Adherent", $id);
            $sql->execute();

            $sql2 = $connex->prepare("DELETE FROM adherent  where idAdherent=:id_Adherent");
            $sql2->bindParam(':id_Adherent', $id);
            $sql2->execute();
            $connex->commit();
            return true;

        } catch (PDOException $error) {
            $connex->rollBack();
            echo "Echec: " . $error->getMessage();
            return false;
        }
    }
}
