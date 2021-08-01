<?php

namespace Brain\Games\Progression;

define("TASKPROGRESSION", 'What number is missing in the progression?');

function getPars(int $minNumber = 1, int $maxNumber = 100): array
{
    $minRange = 5;
    $maxRange = 15;
    $minAdd = 1;
    $maxAdd = 10;
    $progression = getProgression($minNumber, $maxNumber, $minRange, $maxRange, $minAdd, $maxAdd);
    $hiddenPosition = rand(0, $numbersCount - 1);
    $rightAnswer = $progression[$hiddenPosition];
    $progression[$hiddenPosition] = '..';
    $questionString = implode(' ', $progression);
    return array('questionString' => $questionString, 'rightAnswer' => $rightAnswer, 'task' => TASKPROGRESSION);
}

function getProgression(
    int $minNumber,
    int $maxNumber,
    int $minRange = 5,
    int $maxRange = 15,
    int $minAdd = 1,
    int $maxAdd = 10
): array {
    $numbersCount = rand($minRange, $maxRange);
    $progressionStart = rand($minNumber, $maxNumber);
    $progressionAdd = rand($minAdd, $maxAdd);
    $progressionArr = [];
    for ($i = 0; $i < $numbersCount; $i++) {
        $curNumber = $progressionStart + $progressionAdd;
        $progressionArr[] = $curNumber;
        $progressionStart = $curNumber;
    }
    return $progressionArr;
}
