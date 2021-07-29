<?php

namespace Brain\Games\Gcd;

function getPars(int $minNumber = 1, int $maxNumber = 100): array
{
    $task = 'Find the greatest common divisor of given numbers.';
    $number1 = rand($minNumber, $maxNumber);
    $number2 = rand($minNumber, $maxNumber);
    $questionString = "{$number1} {$number2}";
    $rightAnswer = getGCD($number1, $number2);
    return array('questionString' => $questionString, 'rightAnswer' => $rightAnswer, 'task' => $task);
}

function getGCD(int $number1, int $number2): int
{
    $delimeters = [];
    for ($i = 1; $i <= $number1; $i++) {
        if ($number1 % $i === 0) {
            $delimeters[] = $i;
        }
    }
    for ($i = count($delimeters) - 1; $i >= 0; $i--) {
        if ($number2 % $delimeters[$i] === 0) {
            return $delimeters[$i];
        }
    }
}
