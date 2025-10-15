<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\start as startGame;

function start(): void
{
    $task = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $getParams = function (): array {
        $number = random_int(0, 50);
        $isPrime = isPrime($number);

        $correctAnswer = $isPrime ? 'yes' : 'no';
        $questionText = (string) $number;

        return ['question' => $questionText, 'answer' => $correctAnswer];
    };

    startGame($task, $getParams);
}

function isPrime(int $number): bool
{
    if ($number === 2) {
        return true;
    } elseif ($number < 2 || $number % 2 === 0) {
        return false;
    }

    $n = intval(sqrt($number));
    for ($i = 3; $i <= $n; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
