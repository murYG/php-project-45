<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function start($game)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', false, " ");
    line("Hello, %s!", $name);

    line($game['task']);

    $result = true;
    for ($i = 1; $i <= 3; $i++) {
        $params = call_user_func($game['namespace'] . "\\getParams");

        $questionText = $params['question'];
        $correctAnswer = $params['answer'];

        line("Question: $questionText");
        $answer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            $result = false;
            break;
        }

        line("Correct!");
    }

    if ($result) {
        line("Congratulations, $name!.");
    } else {
        line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        line("Let's try again, $name!.");
    }
}
