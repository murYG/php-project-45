<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_GAMES = 3;

function start(string $task, callable $getParams): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', false, " ");
    line("Hello, %s!", $name);

    line($task);

    for ($i = 1; $i <= NUMBER_OF_GAMES; $i++) {
        $params = call_user_func($getParams);

        $questionText = $params['question'];
        $correctAnswer = $params['answer'];

        line("Question: $questionText");
        $answer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }

        line("Correct!");
    }

    line("Congratulations, $name!");
}
