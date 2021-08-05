<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\game;

const TASKCALC = 'What is the result of the expression?';

function start(): void
{
    $name = greetings();
    $funcName = '\Brain\Games\Calc\getPars';
    game($funcName, $name);
}

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

function performOperation(string $operation, int $number1, int $number2): int
{
    switch ($operation) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        default:
            throw new \Exception("Unknown operation");
    }
}
