<?php

namespace Brain\Games\Prime;

function getPars($minNumber = 1, $maxNumber = 100)
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $number = rand($minNumber, $maxNumber);
    $rightAnswer = isPrime($number) ? 'yes' : 'no';
    return array('questionString' => $number, 'rightAnswer' => $rightAnswer, 'task' => $task);
}

function isPrime($number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
