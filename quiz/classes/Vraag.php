<?php
include_once "Antwoord.php";

class Vraag // Hey vraag geef mij [1]
{

    private $nummer;
    public $antwoorden = [];
    private $tekst;
    private $moetIngevultZijn;
    private $openVraag;

    public function __construct($nummer, $tekst, $openVraag, $moetIngevultZijn, $antwoorden)
    {
        $this->nummer = $nummer;
        $this->tekst = $tekst;
        $this->openVraag = $openVraag;
        $this->moetIngevultZijn = $moetIngevultZijn;
        $this->antwoorden = $antwoorden;
    }

    public function geefVraagNummer()
    {
        return $this->nummer;
    }

    public function ishetEenOpenVraag()
    {
        return $this->openVraag;
    }

    public function moetDeVraagIngevultZijn()
    {
        return $this->moetIngevultZijn;
    }

    public function geefTekst() // Een Tekst [1]
    {
        return $this->tekst;
    }


    public function geefAntwoorden() // Een antwoord [1]
    {
        return $this->antwoorden;
    }

    public function getGoedAntwoord()
    {
        foreach ($this->antwoorden as $antwoord) {
            if ($antwoord->getGoed() == true) {
                return $antwoord->getTekst();
            }
        }
    }

}
