<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\game;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MINNUMBER = 1;
const MAXNUMBER = 100;

function start(): void
{
    $getGameData = function (): array {
        $number = rand(MINNUMBER, MAXNUMBER);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';
        return array('question' => $number, 'rightAnswer' => $rightAnswer, 'task' => TASK);
    };
    game($getGameData);
}

function isPrime(int $number): bool
{
    if ($number === 1 || $number === 0) {
        return true;
    }
    if ($number < 0) {
        return false;
    }
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
