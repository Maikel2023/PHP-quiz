<?php

include_once "Antwoord.php";

//met de hidden vraagnummer de gegevens ophalen


//Je wilt eigenlijk zo weinig mogelijk privates hebben, kost allemaal ruimte 
//wij hebben in dit geval de score in een functie verwerkt - geefScore()
//Je zou dit ook kunnen do en voor private vragen
class QuizControle
{
    private $ingevuldeVragen;

    private $quiz;

    private $vragen;

    public function __construct($quiz)
    {
        $this->ingevuldeVragen = [];
        $this->quiz = $quiz;
        $this->vragen = $quiz->getVragen();
    }

    public function setIngevuldeVragen($ingevuldeVragen)
    {
        $this->ingevuldeVragen = $ingevuldeVragen;
    }

    public function isVraagNummerIngevuld($vraagNummer)
    {
        if ($_POST['vraagnummer'] >= $vraagNummer) {
            return true;
        }
    }

    public function getGoedeAntwoordOpVraagNummer($vraagNummer)
    {
        foreach ($this->vragen as $vraag) {
            if ($vraag->geefVraagNummer() == $vraagNummer) {
                foreach ($vraag->geefAntwoorden() as $antwoord) {
                    if ($antwoord->isGoed()) {
                        return $antwoord->getTekst();
                    }
                }
            }
        }
        return null;
    }

    public function getWaaromGoedOfFoutOpVraag($ingevuldeantwoord, $vraagNummer)
    {
        foreach ($this->vragen as $vraag) {
            if ($vraag->geefVraagNummer() == $vraagNummer) {
                foreach ($vraag->geefAntwoorden() as $antwoord) {
                    if ($antwoord->getTekst() === $ingevuldeantwoord && $vraag->ishetEenOpenVraag() == false) {
                        return $antwoord->getWaaromGoedOfFout();
                    } else if ($ingevuldeantwoord == null) {
                        return 'je niks hebt ingevult';
                    } else {
                        return $antwoord->getWaaromGoedOfFout();
                    }
                }
            }
        }
        return null;
    }

    public function geefScore()
    {
        $score = 0;
        foreach ($this->ingevuldeVragen as $ingevuldeAntwoordObject) {
            if ($ingevuldeAntwoordObject->antwoord === $this->getGoedeAntwoordOpVraagNummer($ingevuldeAntwoordObject->vraagnummer)) {
                $score++;
            }
        }
        return $score;
    }

    public function getAntwoordenUitleg()
    {
        $antwoordenControle = '';
        foreach ($this->ingevuldeVragen as $ingevuldeAntwoordObject) {

            $goedeAntwoord = $this->getGoedeAntwoordOpVraagNummer($ingevuldeAntwoordObject->vraagnummer);
            $waaromGoedOfFout = self::getWaaromGoedOfFoutOpVraag($ingevuldeAntwoordObject->antwoord, $ingevuldeAntwoordObject->vraagnummer);

            if ($ingevuldeAntwoordObject->antwoord === $goedeAntwoord) {
                $antwoordenControle .= '<p>Je hebt vraag ' . $ingevuldeAntwoordObject->vraagnummer . ' goed, Het antwoord: "' . $goedeAntwoord . '" is goed <br> Dit komt, omdat ' . $waaromGoedOfFout . '</p>';
            } else {
                $antwoordenControle .= '<p>Je hebt vraag ' . $ingevuldeAntwoordObject->vraagnummer . ' fout, het goede antwoord is :"' . $goedeAntwoord . '"<br> Dit komt, omdat  ' . $waaromGoedOfFout . '</p>';
            }
        }
        return $antwoordenControle;
    }

    public function getScoreScreen()
    {
        $scoreScreen = '<h1>Scorebord</h1> <br>
            <p>je hebt ' . $this->geefScore() . ' / ' . $this->quiz->getAantalVragen() . ' goed!</p> <br>
            
            <br>
            ' . $this->getAntwoordenUitleg() . '
            <br>
        ';

        return $scoreScreen;
    }
 
}