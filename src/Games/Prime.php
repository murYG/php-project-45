<?php

namespace BrainGames\Prime;

function start()
{
    $game = [];
    $game['task'] = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $game['namespace'] = __NAMESPACE__;

    \BrainGames\Engine\start($game);
}

function getParams()
{
    $number = random_int(0, 50);
    $isPrime = isPrime($number);

    $correctAnswer = $isPrime ? 'yes' : 'no';
    $questionText = "$number";

    return ['question' => $questionText, 'answer' => $correctAnswer];
}

function isPrime($number)
{
    if ($number === 2) {
        return true;
    } elseif ($number < 2 || $number % 2 === 0) {
        return false;
    }

    $n = intval(sqrt($number));
    $result = true;

    for ($i = 3; $i <= $n; $i++) {
        if ($number % $i === 0) {
            $result = false;
            break;
        }
    }

    return $result;
}
