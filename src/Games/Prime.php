<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\game;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function start(): void
{
    $getGameData = function (int $minNumber = 1, int $maxNumber = 100): array {
        $number = rand($minNumber, $maxNumber);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';
        return array('question' => $number, 'rightAnswer' => $rightAnswer, 'task' => TASK);
    };
    game($getGameData);
}

function isPrime(int $number): bool
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
