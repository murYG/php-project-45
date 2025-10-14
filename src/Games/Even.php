<?php

namespace BrainGames\Even;

use function BrainGames\Engine\start as startGame;

function start(): void
{
    $game['task'] = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $game['params'] = function (): array {
        $number = random_int(0, 10000);
        $isEven = isEven($number);

        $correctAnswer = $isEven ? 'yes' : 'no';
        $questionText = (string) $number;

        return ['question' => $questionText, 'answer' => $correctAnswer];
    };

    startGame($game);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
