<?php

namespace BrainGames\Even;

function start(): void
{
    $game = [];
    $game['task'] = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $game['params'] = getParams();

    \BrainGames\Engine\start($game);
}

function getParams(): object
{
    return function (): array {
        $number = random_int(0, 10000);
        $isEven = isEven($number);

        $correctAnswer = $isEven ? 'yes' : 'no';
        $questionText = "$number";

        return ['question' => $questionText, 'answer' => $correctAnswer];
    };
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
