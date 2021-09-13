<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\game;

const TASK = 'What number is missing in the progression?';
const MINNUMBER = 1;
const MAXNUMBER = 100;

function start(): void
{
    $getGameData = function (): array {
        $minRange = 5;
        $maxRange = 15;
        $minAdd = 1;
        $maxAdd = 10;
        $progressionStart = rand(MINNUMBER, MAXNUMBER);
        $progressionAdd = rand($minAdd, $maxAdd);
        $progressionLength = rand($minRange, $maxRange);
        $progression = getProgression($progressionStart, $progressionAdd, $progressionLength);
        $hiddenPosition = rand(0, count($progression) - 1);
        $rightAnswer = $progression[$hiddenPosition];
        $progression[$hiddenPosition] = '..';
        $question = implode(' ', $progression);
        return array('question' => $question, 'rightAnswer' => $rightAnswer, 'task' => TASK);
    };
    game($getGameData);
}

function getProgression(
    int $progressionStart,
    int $progressionAdd,
    int $progressionLength
): array {

    $progressionArr = [];
    for ($i = 0; $i < $progressionLength; $i++) {
        $curNumber = $progressionStart + $progressionAdd;
        $progressionArr[] = $curNumber;
        $progressionStart = $curNumber;
    }
    return $progressionArr;
}
