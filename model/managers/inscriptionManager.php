<?php
require("model/classes/Inscription.class.php");

class InscriptionManager{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO; // assigner le pdo: on va mettre donner la valeur de parametre unPDO a l'attribut lePDO
    }


/**
 * Undocumented addInscription
 *methode qui permet d'inserer l'inscription dans la bdd
 * @param Inscription $inscription
 * @return $leResultat
 */
    public function addInscription(Inscription $inscription)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("INSERT INTO inscription (idSeance,idAdherent) values(:idSeance,:idAdherent)");

            $sql->bindValue(":idSeance", $inscription->getIdSeance());
            $sql->bindValue(":idAdherent", $inscription->getIdAdherent());
            $leResultat = $sql->execute();  
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    /**
     * Undocumented getAllInscriptionByIdSeance
     *methode qui permet de recuperer tous les inscriptions by id seance
     * @param [type] $id
     * @return $leResultat
     */
    public function getAllInscriptionsByIdSeance($id)
    {

        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM inscription where idSeance=:id_Seance  ORDER BY idAdherent");
            $sql->bindParam(":id_Seance", $id);
            $sql->execute();
            $leResultat = ($sql->fetchAll(PDO::FETCH_CLASS, "inscription"));
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
/**
 * Undocumented getInscriptionByIdAdherent
 *methode qui permet de recuperer tous les inscriptions by id adherent
 * @param [type] $id
 * @return $leResultat
 */
    public function getInscriptionByIdAdherent($id)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM inscription WHERE idAdherent = :id_Adherent ");
            $sql->bindParam(":id_Adherent", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "inscription");
            $resultat = ($sql->fetch());
            return $resultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    /**
     * Undocumented deleteInscriptionByIdAdherent
     * methode qui permet de supprimer une inscription by id adherent     *
     * @param [int] $id
     * @return $leresultat
     */
    public function deleteInscriptionByIdAdherent($id)
    {       
        try 
        {
        $connex = $this->lePDO;
        $sql = $connex->prepare("DELETE FROM inscription where idAdherent=:id_Adherent") ;
        $sql->bindParam(':id_Adherent',$id) ;
        $leResultat = $sql->execute();  
        return $leResultat;

        }
        catch (PDOException $error) 
        {
            echo $error->getMessage();
        }
        
    }
}
