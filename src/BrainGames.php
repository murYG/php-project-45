<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

function Even()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    $answers = [true => "yes", false => "no"];

    $result = true;
    for ($i = 1; $i <= 3; $i++) {
        $number = mt_rand(0, 10000);
        $correctAnswer = $answers[isEven($number)];

        line("Question: $number");
        $answer = prompt('Your answer');

        if (strtolower($answer) !== $answers[isEven($number)]) {
            //про важность регистра в задании не упоминалось, но, возможно, это подразумевалось
            // в "Любой некорректный ввод считается ошибкой", не уверена
            //хотела использовать mb_strtolower, но для него нужна дополнительная установка
            // расширения насколько я поняла. Поскольку поддержка юникода в данной задаче
            // не нужна, оставила strtolower
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

function isEven($number)
{
    return $number % 2 === 0;
}
