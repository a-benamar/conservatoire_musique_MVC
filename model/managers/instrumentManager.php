<?php
require("model/classes/Instrument.class.php");

class InstrumentManager{

    private $lePDO;

    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO; // assigner le pdo: on va mettre donner la valeur de parametre unPDO a l'attribut lePDO
    }

/**
 * Undocumented function
 *methode qui permet de recuperer instrument by un id
 * @param [type] $id
 * @return $leResultat
 */
    public function getInstrumentById($id)
    {
        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM instrument WHERE idInstrument=:id_Instrument ");
            $sql->bindParam(":id_Instrument", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Instrument");
            $resultat = ($sql->fetch());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    
/**
 * Undocumented function
 *methode permet de recuperer tous les instruments
 * @return $leResultat
 */
    public function getAllInstruments()
    {

        try {

            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM instrument ORDER BY idInstrument");
            $sql->execute();
            $leResultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Instrument"));
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }


/**
 * Undocumented function
 *methode permet d'ajouter un instrumment
 * @param Instrument $instrument
 * @return $leResultat
 */
    public function addInstrument(Instrument $instrument)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("INSERT INTO instrument (libInstrument) values(:lib_Instrument)");

            $sql->bindValue(":lib_Instrument", $instrument->getLibInstrument());
            $leResultat = $sql->execute();  
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

/**
 * Undocumented function
 *methode qui permet de modifier un instrument
 * @param Instrument $instrument
 * @return $leResultat
 */
    public function updateInstrument(Instrument $instrument)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("UPDATE instrument set libInstrujment = :lib_Instrument where idInstrument=:id_Instrument");

            $sql->bindValue(":lib_Instrujment", $instrument->getLibInstrument());     
            $leResultat = $sql->execute();  
            return $leResultat;

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

/**
 * Undocumented function
 *methode qui permet de supprimer un instrument
 * @param [type] $id
 * @return $leResultat
 */
    public function deleteInstrumentById($id)
    {
        try {
            $connex = $this->lePDO;
            $connex->beginTransaction();

            $sql = $connex->prepare("DELETE FROM instrument where idInstrument=:id_Instrument");
            $sql->bindParam(":id_Instrument", $id);
            $sql->execute();

            $sql2 = $connex->prepare("DELETE FROM instrument  where idInstrument=:id_Instrument");
            $sql2->bindParam(":id_Instrument", $id);
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