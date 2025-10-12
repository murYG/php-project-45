<?php

namespace BrainGames\Calc;

function start()
{
    $game = [];
    $game['task'] = "What is the result of the expression?";
    $game['namespace'] = __NAMESPACE__;

    \BrainGames\Engine\start($game);
}

function getParams()
{
    $operand1 = mt_rand(0, 20);
    $operand2 = mt_rand(0, 20);
    $operatorIndex = mt_rand(0, 2);
    $arOperator = ["+", "-", "*"];

    $operator = $arOperator[$operatorIndex];

    $correctAnswer = (string) doCalc($operand1, $operand2, $operator);
    $questionText = "$operand1 $operator $operand2";

    return ['question' => $questionText, 'answer' => $correctAnswer];
}

function doCalc($operand1, $operand2, $operator)
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
