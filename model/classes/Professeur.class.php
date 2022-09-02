<?php

class Professeur {
    private $idProf;
    private $nomProf;
    private $prenomProf;
    private $telProf;

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

    /**
     * Get the value of nomProf
     */ 
    public function getNomProf()
    {
        return $this->nomProf;
    }

    /**
     * Set the value of nomProf
     *
     * @return  self
     */ 
    public function setNomProf($nomProf)
    {
        $this->nomProf = $nomProf;

        return $this;
    }

    /**
     * Get the value of prenomProf
     */ 
    public function getPrenomProf()
    {
        return $this->prenomProf;
    }

    /**
     * Set the value of prenomProf
     *
     * @return  self
     */ 
    public function setPrenomProf($prenomProf)
    {
        $this->prenomProf = $prenomProf;

        return $this;
    }

    /**
     * Get the value of telProf
     */ 
    public function getTelProf()
    {
        return $this->telProf;
    }

    /**
     * Set the value of telProf
     *
     * @return  self
     */ 
    public function setTelProf($telProf)
    {
        $this->telProf = $telProf;

        return $this;
    }
}





?>