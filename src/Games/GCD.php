<?php

namespace BrainGames\GCD;

use function BrainGames\Engine\start as startGame;

function start(): void
{
    $game = [];
    $game['task'] = "Find the greatest common divisor of given numbers.";
    $game['params'] = function (): array {
        $operand1 = random_int(1, 50);
        $operand2 = random_int(1, 50);

        $correctAnswer = (string) gcd($operand1, $operand2);
        $questionText = "$operand1 $operand2";

        return ['question' => $questionText, 'answer' => $correctAnswer];
    };

    startGame($game);
}

function gcd(int $a, int $b): int
{
    if ($a === 0 || $b === 0) {
        return 0;
    }

    $o1 = max($a, $b);
    $o2 = min($a, $b);

    $r = $o1 % $o2;

    return $r === 0 ? $o2 : gcd($o2, $r);
}
