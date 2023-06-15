<?php

class Antwoord //Hey antwoord geef mij [1]
{
    private $isGoed;
    private $tekst;
    private $waaromGoedOfFout;
 
    //construct word altijd als eerste uitgevoerd!!!
    public function __construct($tekst, $isGoed, $waaromGoedOfFout)
    {
        $this->tekst = $tekst;
        $this->isGoed = $isGoed;
        $this->waaromGoedOfFout = $waaromGoedOfFout;
    }

    public function isGoed()
    { 
        return $this->isGoed;
    }

    public function getGoed()
    {
        //TODO: kan op een gegeven moment weg
        error_log("Antwoord getGoed deprecated gebruikt..."); //<--- gewoonte ding van cor (als het niet werkts)
        return $this->isGoed;
    }
    
    public function getFrontendData()
    {
        return $this->tekst;
    }

    public function getTekst()
    {
        return $this->tekst;
    }

    public function getWaaromGoedOfFout()
    {
        return $this->waaromGoedOfFout;
    }

}