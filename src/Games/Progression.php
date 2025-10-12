<?php

namespace BrainGames\Progression;

function start()
{
    $game = [];
    $game['task'] = "What number is missing in the progression?";
    $game['namespace'] = "\BrainGames\Progression";

    \BrainGames\Engine\start($game);
}

function getParams()
{
    $progressionLength = mt_rand(5, 15);
    $progressionStep = mt_rand(1, 10);
    $progressionStart = mt_rand(1, 10);
    $missingIndex = mt_rand(0, $progressionLength - 1);

    $progression = generateProgression($progressionStart, $progressionLength, $progressionStep);

    $correctAnswer = (string) $progression[$missingIndex];
    $progression[$missingIndex] = '..';
    $questionText = implode(' ', $progression);

    return ['question' => $questionText, 'answer' => $correctAnswer];
}

function generateProgression($start, $length, $step)
{
    $result = [];

    for ($i = 0; $i < $length; $i++) {
        $result[] = $start + $i * $step;
    }

    return $result;
}
