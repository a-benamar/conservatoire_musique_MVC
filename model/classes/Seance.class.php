<?php

class Seance {

    private $idSeance;
    private $dateSeance;
    private $idInstrument;
    private $idProf;



    /**
     * Get the value of idSeance
     */ 
    public function getIdSeance()
    {
        return $this->idSeance;
    }

    /**
     * Set the value of idSeance
     *
     * @return  self
     */ 
    public function setIdSeance($idSeance)
    {
        $this->idSeance = $idSeance;

        return $this;
    }

    /**
     * Get the value of dateSeance
     */ 
    public function getDateSeance()
    {
        return $this->dateSeance;
    }

    /**
     * Set the value of dateSeance
     *
     * @return  self
     */ 
    public function setDateSeance($dateSeance)
    {
        $this->dateSeance = $dateSeance;

        return $this;
    }

    /**
     * Get the value of idInstrument
     */ 
    public function getIdInstrument()
    {
        return $this->idInstrument;
    }

    /**
     * Set the value of idInstrument
     *
     * @return  self
     */ 
    public function setIdInstrument($idInstrument)
    {
        $this->idInstrument = $idInstrument;

        return $this;
    }

    /**
     * Get the value of idProf
     */ 
    public function getIdProf()
    {
        return $this->idProf;
    }

    /**
     * Set the value of idProf
     *
     * @return  self
     */ 
    public function setIdProf($idProf)
    {
        $this->idProf = $idProf;

        return $this;
    }
}

?>