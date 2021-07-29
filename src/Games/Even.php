<?php

namespace Brain\Games\Even;

function getPars($minNumber = 1, $maxNumber = 100)
{
    $task = 'Answer "yes" if the number is even, otherwise answer "no".';
    $number = rand($minNumber, $maxNumber);
    $rightAnswer = ($number % 2) === 0 ? 'yes' : 'no';
    return array('questionString' => $number, 'rightAnswer' => $rightAnswer, 'task' => $task);
}
