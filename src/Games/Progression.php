<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\start as startGame;

function start(): void
{
    $game['task'] = "What number is missing in the progression?";
    $game['params'] = function (): array {
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

    startGame($game);
}

function generateProgression(int $start, int $length, int $step): array
{
    $result = [];

    for ($i = 0; $i < $length; $i++) {
        $result[] = $start + $i * $step;
    }

    return $result;
}
