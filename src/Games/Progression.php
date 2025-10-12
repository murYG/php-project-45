<?php

namespace BrainGames\Progression;

function start(): void
{
    $game = [];
    $game['task'] = "What number is missing in the progression?";
    $game['params'] = getParams();

    \BrainGames\Engine\start($game);
}

function getParams(): object
{
    return function (): array {
        $progressionLength = random_int(5, 15);
        $progressionStep = random_int(1, 10);
        $progressionStart = random_int(1, 10);
        $missingIndex = random_int(0, $progressionLength - 1);

        $progression = generateProgression($progressionStart, $progressionLength, $progressionStep);

        $correctAnswer = (string) $progression[$missingIndex];
        $progression[$missingIndex] = '..';
        $questionText = implode(' ', $progression);

        return ['question' => $questionText, 'answer' => $correctAnswer];
    };
}

function generateProgression(int $start, int $length, int $step): array
{
    $result = [];

    for ($i = 0; $i < $length; $i++) {
        $result[] = $start + $i * $step;
    }

    return $result;
}
