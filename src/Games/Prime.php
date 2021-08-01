<?php

namespace Brain\Games\Prime;

define("TASKPRIME", 'Answer "yes" if given number is prime. Otherwise answer "no".');

function getPars(int $minNumber = 1, int $maxNumber = 100): array
{
    $number = rand($minNumber, $maxNumber);
    $rightAnswer = isPrime($number) ? 'yes' : 'no';
    return array('questionString' => $number, 'rightAnswer' => $rightAnswer, 'task' => TASKPRIME);
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
