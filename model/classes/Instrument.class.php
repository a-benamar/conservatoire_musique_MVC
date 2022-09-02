<?php

class Instrument {
    private $idInstrument;
    private $libInstrument;




    

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
     * Get the value of libInstrument
     */ 
    public function getLibInstrument()
    {
        return $this->libInstrument;
    }

    /**
     * Set the value of libInstrument
     *
     * @return  self
     */ 
    public function setLibInstrument($libInstrument)
    {
        $this->libInstrument = $libInstrument;

        return $this;
    }
}