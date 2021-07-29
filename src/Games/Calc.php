<?php

namespace Brain\Games\Calc;

function getPars(int $minNumber = 1, int $maxNumber = 100): array
{
    $task = 'What is the result of the expression?';
    $operations = ['+', '-', '*'];
    $number1 = rand($minNumber, $maxNumber);
    $number2 = rand($minNumber, $maxNumber);
    $operation = $operations[rand(0, count($operations) - 1)];
    if ($operation === '+') {
        $rightAnswer = $number1 + $number2;
    } elseif ($operation === '-') {
        $rightAnswer = $number1 - $number2;
    } else {
        $rightAnswer = $number1 * $number2;
    }
    $questionString = "{$number1} {$operation} {$number2}";
    return array('questionString' => $questionString, 'rightAnswer' => $rightAnswer, 'task' => $task);
}
