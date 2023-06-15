
<?php
session_start();
include_once "AntwoordFormulier.php";
class QuizHTMLForm
{
    private $quiz;
    private $antwoordFormulier;
    private $quizFlow;
    public function __construct($quizFlow, $quiz)
    {
        $this->quizFlow = $quizFlow;
        $this->quiz = $quiz;
    }
    public function getSubmittedQuizData()
    {
        if (isset($_POST["ingevuldevragen"])) {
            $ingevuldeVragen = json_decode($_POST["ingevuldevragen"]);
        } else {
            $ingevuldeVragen = [];
        }
        //cor gemaakt heeft er objects van gemaakt.
        //een verbetering voor de counter 
        //geeft ook de vraagnummer mee inplaats van alleen de vraag
        if (isset($_POST["antwoord"]) && isset($_POST["vraagnummer"])) {
            //als er een nieuwe vraag word gepost
            $antwoordObject = new stdClass();
            $antwoordObject->vraagnummer = $_POST["vraagnummer"];
            $antwoordObject->antwoord = $_POST["antwoord"];
            $ingevuldeVragen[] = $antwoordObject;
        }
        return $ingevuldeVragen;
    }
    public function getHTML()
    {
        $volgendeVraag = $this->quizFlow->geefVolgendeNietIngevuldeVraag();
        if ($volgendeVraag === null) {
            return 'Er is geen vraag..';
        }
        if ($volgendeVraag->ishetEenOpenVraag() == false) {
            $keuzes = '';
            foreach ($volgendeVraag->geefAntwoorden() as $antwoordKeuze) {
                $keuzes .= '<input type="radio"  value="' . $antwoordKeuze->getTekst() . '" name="antwoord"/>' . $antwoordKeuze->getTekst() . '<br>
                ';
            }
        } else {
            $keuzes = '<input type="text" autocomplete="off" value="" name="antwoord"><br>';
        }
        if ($volgendeVraag->moetDeVraagIngevultZijn() == false) {
            $leegAntwoord = '<input type="hidden" name="antwoord" value="' . null . '">';
        }
        $form = ' <form method="POST">
        <h1>Vraag: ' . $volgendeVraag->geefVraagNummer() . '</h1>
        
        <h2>' . $volgendeVraag->geefTekst() . '</h2>
        <input type="hidden" name="ingevuldevragen" value="' . htmlspecialchars(json_encode($this->getSubmittedQuizData())) . '">
        <input type="hidden" name="vraagnummer" id="counter" value="' . $volgendeVraag->geefVraagNummer() . '">
        <input type="hidden" name="nietingevuldevragen" value="' . htmlspecialchars(json_encode($this->nietIngevuldeVragen)) . '">
        ' . $leegAntwoord . '
        ' . $keuzes . '
        <br>
        <input type="submit" value="Submit" " name="submit">
        </form>
        <br>    
        ';
        return $form;
    }
}