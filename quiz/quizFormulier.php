<?php

//De Achos Quiz







//Bekijk met cntrl u en vergelijk de code

include_once "classes/Quiz.php";
include_once "classes/QuizHTMLForm.php";
include_once "classes/QuizFlow.php";
include_once "classes/QuizControle.php";

ob_start();

echo 'test';

//LATER
//VueJS ombouwen (quizformulier)

?>
<!DOCTYPE html>
<html>

<head>

  <title>Quiz Formulier</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
</head>

<body>

  <?php

  print_r($_POST); 

  $quiz = new Quiz();

  $quizControle = new QuizControle($quiz);
  $quizFlow = new QuizFlow($quiz, $quizControle);
  $quizForm = new QuizHTMLForm($quizFlow, $quiz);
  $ingevuldeVragen = $quizForm->getSubmittedQuizData();
  $quizControle->setIngevuldeVragen($ingevuldeVragen);


  // wanneer de vraag nummer waar je nu bent hoger is dan het aantal vragen dat er zijn dan moet het scorebord komen
  if (!$quizFlow->isDeQuizVolledigIngevuld()) {
    print_r($quizForm->getHTML());
  } else { //als er iets anders gebeurd doe dan...
  
    echo $quizControle->getScoreScreen(); //echo de de scorenboard
  }
  ?>

</body>

</html>

