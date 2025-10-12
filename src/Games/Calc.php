<?php

namespace BrainGames\Calc;

function start(): void
{
    $game = [];
    $game['task'] = "What is the result of the expression?";
    $game['namespace'] = __NAMESPACE__;

    \BrainGames\Engine\start($game);
}

function getParams(): array
{
    $operand1 = random_int(0, 20);
    $operand2 = random_int(0, 20);
    $operatorIndex = random_int(0, 2);
    $arOperator = ["+", "-", "*"];

    $operator = $arOperator[$operatorIndex];

    $correctAnswer = (string) doCalc($operand1, $operand2, $operator);
    $questionText = "$operand1 $operator $operand2";

    return ['question' => $questionText, 'answer' => $correctAnswer];
}

function doCalc(int $operand1, int $operand2, string $operator): int
{
    switch ($operator) {
        case '+':
            $result = $operand1 + $operand2;
            break;
        case '-':
            $result = $operand1 - $operand2;
            break;
        case '*':
            $result = $operand1 * $operand2;
            break;
        default:
            $result = null;
            break;
    }

    return $result;
}
