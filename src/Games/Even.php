<?php

namespace BrainGames\Even;

function start()
{
    $game = [];
    $game['task'] = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $game['namespace'] = __NAMESPACE__;

    \BrainGames\Engine\start($game);
}

function getParams()
{
    $number = random_int(0, 10000);
    $isEven = isEven($number);

    $correctAnswer = $isEven ? 'yes' : 'no';
    $questionText = "$number";

    return ['question' => $questionText, 'answer' => $correctAnswer];
}

function isEven($number)
{
    return $number % 2 === 0;
}
