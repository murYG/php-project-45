<?php

namespace BrainGames\GCD;

function start()
{
    $game = [];
    $game['task'] = "Find the greatest common divisor of given numbers.";
    $game['namespace'] = __NAMESPACE__;

    \BrainGames\Engine\start($game);
}

function getParams()
{
    $operand1 = rand(1, 50);
    $operand2 = rand(1, 50);

    $correctAnswer = (string) gcd($operand1, $operand2);
    $questionText = "$operand1 $operand2";

    return ['question' => $questionText, 'answer' => $correctAnswer];
}

function gcd($a, $b)
{
    if ($a === 0 || $b === 0) {
        return 0;
    }

    $o1 = max($a, $b);
    $o2 = min($a, $b);

    $r = $o1 % $o2;

    return $r === 0 ? $o2 : gcd($o2, $r);
}
