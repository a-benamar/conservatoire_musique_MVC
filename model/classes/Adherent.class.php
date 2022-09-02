<?php

class Adherent {
    private $idAdherent;
    private $nomAdherent;
    private $prenomAdherent;
    private $mailAdherent;
    private $telAdherent;
    private $dateInscription;
    private $idSeance;


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

    /**
     * Get the value of nomAdherent
     */ 
    public function getNomAdherent()
    {
        return $this->nomAdherent;
    }

    /**
     * Set the value of nomAdherent
     *
     * @return  self
     */ 
    public function setNomAdherent($nomAdherent)
    {
        $this->nomAdherent = $nomAdherent;

        return $this;
    }

    /**
     * Get the value of prenomAdherent
     */ 
    public function getPrenomAdherent()
    {
        return $this->prenomAdherent;
    }

    /**
     * Set the value of prenomAdherent
     *
     * @return  self
     */ 
    public function setPrenomAdherent($prenomAdherent)
    {
        $this->prenomAdherent = $prenomAdherent;

        return $this;
    }

    /**
     * Get the value of mailAdherent
     */ 
    public function getMailAdherent()
    {
        return $this->mailAdherent;
    }

    /**
     * Set the value of mailAdherent
     *
     * @return  self
     */ 
    public function setMailAdherent($mailAdherent)
    {
        $this->mailAdherent = $mailAdherent;

        return $this;
    }

    /**
     * Get the value of telAdherent
     */ 
    public function getTelAdherent()
    {
        return $this->telAdherent;
    }

    /**
     * Set the value of telAdherent
     *
     * @return  self
     */ 
    public function setTelAdherent($telAdherent)
    {
        $this->telAdherent = $telAdherent;

        return $this;
    }

    /**
     * Get the value of dateInscription
     */ 
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set the value of dateInscription
     *
     * @return  self
     */ 
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

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
}