<?php

namespace Brain\Games\Even;

const TASKEVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function getPars(int $minNumber = 1, int $maxNumber = 100): array
{
    $number = rand($minNumber, $maxNumber);
    $rightAnswer = ($number % 2) === 0 ? 'yes' : 'no';
    return array('questionString' => $number, 'rightAnswer' => $rightAnswer, 'task' => TASKEVEN);
}
