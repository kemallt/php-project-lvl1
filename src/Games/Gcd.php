<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\game;

const TASK = 'Find the greatest common divisor of given numbers.';
const MINNUMBER = 1;
const MAXNUMBER = 100;

function start(): void
{
    $getGameData = function (): array {
        $number1 = rand(MINNUMBER, MAXNUMBER);
        $number2 = rand(MINNUMBER, MAXNUMBER);
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
