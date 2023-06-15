<?php
include_once "./quizFormulier.php";


class QuizFlow
{
    private $quiz;

    private $quizControle;

    private $vragen;

    public function __construct($quiz, $quizControle)
    {
        $this->quiz = $quiz;
        $this->quizControle = $quizControle;
        $this->vragen = $this->quiz->getVragen();
    }

    public function geefVolgendeNietIngevuldeVraag()
    {
        foreach ($this->vragen as $vraag) {
            if (!$this->quizControle->isVraagNummerIngevuld($vraag->geefVraagNummer())) {
                return $vraag;
            }
        }
        return null;
    }

    public function isDeQuizVolledigIngevuld()
    {
        return ($this->geefVolgendeNietIngevuldeVraag() === null);
    }

}
