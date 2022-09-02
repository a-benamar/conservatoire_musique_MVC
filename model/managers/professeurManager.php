<?php
require("model/classes/Professeur.class.php");

/**
 * Undocumented class
 */
class ProfesseurManager{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO; // assigner le pdo: on va mettre donner la valeur de parametre unPDO a l'attribut lePDO
    }

/**
 * Undocumented function
 *methode qui permet de recuperer un professeur by id
 * @param [type] $id
 * @return $leResultat
 */
    public function getProfesseureById($id)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM professeur WHERE idProf=:id_Prof ");
            $sql->bindParam(":id_Prof", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Professeur");
            $resultat = ($sql->fetch());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    
/**
 * Undocumented function
 *methode qui permet de recuper tous les professeurs
 * @return $leResultat
 */
    public function getAllProfesseurs()
    {

        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM professeur ORDER BY idProf");
            $sql->execute();
            $leResultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Professeur"));
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    

/**
 * Undocumented function
 *methode qui permet d'ajouter un professeur
 * @param Professeur $professeur
 * @return $leResultat
 */
    public function addProfesseur(Professeur $professeur)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("INSERT INTO professeur (nomProf,prenomProf,telProf) values(:nom_Prof,:prenom_Prof,:tel_Prof)");

            $sql->bindValue(":nomProf", $professeur->getnomProf());
            $sql->bindValue(":prenomProf", $professeur->getPrenomProf());
            $sql->bindValue(":telProf", $professeur->getTelProf());
            $leResultat = $sql->execute();  
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

/**
 * Undocumented function
 *methode permet de modifier un professeur
 * @param Professeur $professeur
 * @return $leResultat
 */
    public function updateProfesseur(Professeur $professeur)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("UPDATE professeur set nomProf=:nom_Prof, prenomProf=:prenom_Prof, telProf=:tel_Prof where idProf=:id_Prof ");

            $sql->bindValue(":nom_Prof", $professeur->getNomProf());
            $sql->bindValue(":prenom_Prof", $professeur->getPrenomProf());
            $sql->bindValue(":tel_Prof", $professeur->getTelProf());      
            $leResultat = $sql->execute();  
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }


/**
 * Undocumented function
 *methode qui permet de supprimer un professeur et les seances rattaché a lui 
 * @param [type] $id
 * @return bool
 */
    public function deleteProfesseurById($id)
    {
        try {
            $connex = $this->lePDO;
            $connex->beginTransaction();

            $sql = $connex->prepare("DELETE FROM professeur where idProf=:id_Prof");
            $sql->bindParam(":id_Prof", $id);
            $sql->execute();

            $sql2 = $connex->prepare("DELETE FROM seance  where idProf=:id_Prof");
            $sql2->bindParam(':id_Prof', $id);
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

?>