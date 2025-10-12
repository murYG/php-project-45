<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function start(array $game): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', false, " ");
    line("Hello, %s!", $name);

    line($game['task']);

    $result = true;
    $gameNamespace = $game['namespace'];
    $numberOfGames = 3;
    for ($i = 1; $i <= $numberOfGames; $i++) {
        $params = call_user_func("$gameNamespace\\getParams");

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
        line("Congratulations, $name!");
    } else {
        line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        line("Let's try again, $name!");
    }
}
