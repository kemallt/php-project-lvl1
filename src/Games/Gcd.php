<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\game;

const TASK = 'Find the greatest common divisor of given numbers.';

function start(): void
{
    $getGameData = function (int $minNumber = 1, int $maxNumber = 100): array {
        $number1 = rand($minNumber, $maxNumber);
        $number2 = rand($minNumber, $maxNumber);
        $question = "{$number1} {$number2}";
        $rightAnswer = getGcd($number1, $number2);
        return array('question' => $question, 'rightAnswer' => $rightAnswer, 'task' => TASK);
    };
    game($getGameData);
}

function getGcd(int $number1, int $number2): int
{
    $mod = abs($number1 % $number2);
    if ($mod === 0) {
        return $number2;
    }
    return getGcd($number2, $mod);
}
