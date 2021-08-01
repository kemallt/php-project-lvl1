<?php

namespace Brain\Games\Calc;

define("TASKCALC", 'What is the result of the expression?');

function getPars(int $minNumber = 1, int $maxNumber = 100): array
{
    $operations = ['+', '-', '*'];
    $number1 = rand($minNumber, $maxNumber);
    $number2 = rand($minNumber, $maxNumber);
    $operation = $operations[rand(0, count($operations) - 1)];
    $rightAnswer = performOperation($operation, $number1, $number2);
    $questionString = "{$number1} {$operation} {$number2}";
    return array('questionString' => $questionString, 'rightAnswer' => $rightAnswer, 'task' => TASKCALC);
}

function performOperation(string $operation, int ...$numbers): int
{
    switch ($operation) {
        case '+':
            return $numbers[0] + $numbers[1];
        case '-':
            return $numbers[0] - $numbers[1];
        case '*':
            return $numbers[0] * $numbers[1];
        default:
            return null;
    }
}
