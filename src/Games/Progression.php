<?php

namespace Brain\Games\Progression;

function getPars(int $minNumber = 1, int $maxNumber = 100): array
{
    $minRange = 5;
    $maxRange = 15;
    $minAdd = 1;
    $maxAdd = 10;
    $task = 'What number is missing in the progression?';
    $numbersCount = rand($minRange, $maxRange);
    $progressionStart = rand($minNumber, $maxNumber);
    $progressionAdd = rand($minAdd, $maxAdd);
    $progressionArr = [];
    $hiddenPosition = rand(0, $numbersCount - 1);
    $questionString = "";
    $rightAnswer = null;
    for ($i = 0; $i < $numbersCount; $i++) {
        $curNumber = $progressionStart + $progressionAdd;
        $progressionArr[] = $curNumber;
        $progressionStart = $curNumber;
        if ($i === $hiddenPosition) {
            $questionString .= ".. ";
            $rightAnswer = $curNumber;
        } else {
            $questionString .= "{$curNumber} ";
        }
    }
    return array('questionString' => trim($questionString), 'rightAnswer' => $rightAnswer, 'task' => $task);
}
