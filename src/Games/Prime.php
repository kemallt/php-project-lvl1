<?php

namespace Brain\Games\Prime;

function getPars(int $minNumber = 1, int $maxNumber = 100): array
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $number = rand($minNumber, $maxNumber);
    $rightAnswer = isPrime($number) ? 'yes' : 'no';
    return array('questionString' => $number, 'rightAnswer' => $rightAnswer, 'task' => $task);
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
