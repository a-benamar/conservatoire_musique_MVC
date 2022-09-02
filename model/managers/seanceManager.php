<?php
require("model/classes/Seance.class.php");
/**
 * Undocumented class
 */
class SeanceManager{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO; // assigner le pdo: on va mettre donner la valeur de parametre unPDO a l'attribut lePDO
    }

/**
 * Undocumented function
 *methode recupere une seance by un id
 * @param [type] $id
 * @return $leResultat
 */
    public function getSeanceById($id)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM seance WHERE idSeance=:id_Seance ");
            $sql->bindParam(":id_Seance", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Seance");
            $resultat = ($sql->fetch());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

/**
 * Undocumented function
 *methode permet de recuper les seances by id adherent
 * @param [type] $id
 * @return $leResultat
 */
    public function getSeanceByIdAdherent($id)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM seance WHERE idAdherent=:id_Adherent ");
            $sql->bindParam(":id_Adherent", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Seance");
            $resultat = ($sql->fetch());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    
/**
 * Undocumented function
 *methode permet de recuperer toustes les seances
 * @return $leResultat
 */
    public function getAllSeances()
    {

        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM seance ORDER BY idSeance");
            $sql->execute();
            $leResultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Seance"));
            return $leResultat;
            //var_dump($leResultat);exit;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }


}

?>