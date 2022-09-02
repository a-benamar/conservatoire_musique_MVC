<?php 

class Inscription {
    private $idSeance;
    private $idAdherent;



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
     * Get the value of idAdherent
     */ 
    public function getIdAdherent()
    {
        return $this->idAdherent;
    }

    /**
     * Set the value of idAdherent
     *
     * @return  self
     */ 
    public function setIdAdherent($idAdherent)
    {
        $this->idAdherent = $idAdherent;

        return $this;
    }
}