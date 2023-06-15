<?php

class AntwoordFormulier
{
    private $antwoordenNummerKeuze;

    private $antwoordTekst;

    public function __contruct()
    { 
        $this->antwoordenNummerKeuze = [];
    }

    public function antwoordToevoegen($keuze)
    {
        $this->antwoordenNummerKeuze = $keuze;
        return $this->antwoordenNummerKeuze;
    }


 
    public function krijgAntwoordOpVraag($vraagNummer)
    {
        if (isset($this->antwoordenNummerKeuze[$vraagNummer])) {
            return $this->antwoordenNummerKeuze[$vraagNummer];
        }
        return false;
    }

    public function krijgAantalIngevuldeAntwoorden()
    {
        return count($this->antwoordenNummerKeuze);
    }
}