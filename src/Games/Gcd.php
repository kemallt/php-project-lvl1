<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\game;

const TASKGCD = 'Find the greatest common divisor of given numbers.';

function start(): void
{
    $getPars = function (int $minNumber = 1, int $maxNumber = 100): array {
        $number1 = rand($minNumber, $maxNumber);
        $number2 = rand($minNumber, $maxNumber);
        $questionString = "{$number1} {$number2}";
        $rightAnswer = getGcd($number1, $number2);
        return array('questionString' => $questionString, 'rightAnswer' => $rightAnswer, 'task' => TASKGCD);
    };
    game($getPars);
}


function getGcd(int $number1, int $number2): int
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
    return 1;
}
