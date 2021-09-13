<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\game;

const TASK = 'What is the result of the expression?';
const MINNUMBER = 1;
const MAXNUMBER = 100;

function start(): void
{
    $getGameData = function (): array {
        $operations = ['+', '-', '*'];
        $number1 = rand(MUNNUMBER, MAXNUMBER);
        $number2 = rand(MUNNUMBER, MAXNUMBER);
        $operation = $operations[rand(0, count($operations) - 1)];
        $rightAnswer = performOperation($operation, $number1, $number2);
        $question = "{$number1} {$operation} {$number2}";
        return array('question' => $question, 'rightAnswer' => $rightAnswer, 'task' => TASK);
    };
    game($getGameData);
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
