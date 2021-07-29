<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function start($type)
{
    $name = greetings();
    game($type, $name);
}

function greetings()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function game($type, $name)
{
    $tasks = array('even' => 'Answer "yes" if the number is even, otherwise answer "no".',
                    'calc' => 'What is the result of the expression?',
                    'gcd' => 'Find the greatest common divisor of given numbers.',
                    'progression' => 'What number is missing in the progression?',
                    'prime' => 'Answer "yes" if given number is prime. Otherwise answer "no".');
    line($tasks[$type]);
    for ($i = 0; $i < 3; $i++) {
        if ($type === 'even') {
            $pars = getEvenPars();
        } elseif ($type === 'calc') {
            $pars = getCalcPars();
        } elseif ($type === 'gcd') {
            $pars = getGCDPars();
        } elseif ($type === 'progression') {
            $pars = getProgressionPars();
        } elseif ($type === 'prime') {
            $pars = getPrimePars();
        }
        ['questionString' => $questionString, 'rightAnswer' => $rightAnswer] = $pars;
        $answer = prompt("Question: {$questionString}");
        if ($answer == $rightAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $rightAnswer);
            line("Let's try again, %s", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}

function getPrimePars()
{
    $number = rand(1, 100);
    $rightAnswer = isPrime($number) ? 'yes' : 'no';
    return array('questionString' => $number, 'rightAnswer' => $rightAnswer);
}

function getProgressionPars()
{
    $numbersCount = rand(5, 15);
    $progressionStart = rand(1, 100);
    $progressionAdd = rand(1, 10);
    $progressionArr = [];
    $hiddenPosition = rand(0, $numbersCount - 1);
    $questionString = "";
    for ($i = 0; $i < $numbersCount; $i++) {
        $curNumber = $progressionStart + $progressionAdd;
        $progressionArr[] = $curNumber;
        $progressionStart = $curNumber;
        if ($i === $hiddenPosition) {
            $questionString .= ".. ";
            $rightAnswer = $curNumber;
        } else {
            $questionString .= "{$curNumber} ";
        }
    }
    return array('questionString' => trim($questionString), 'rightAnswer' => $rightAnswer);
}

function getGCDPars()
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    $questionString = "{$number1} {$number2}";
    $rightAnswer = $getGCD($number1, $number2);
    return array('questionString' => $questionString, 'rightAnswer' => $rightAnswer);
}

function getEvenPars()
{
    $number = rand(1, 100);
    $rightAnswer = ($number % 2) === 0 ? 'yes' : 'no';
    return array('questionString' => $number, 'rightAnswer' => $rightAnswer);
}

function getCalcPars()
{
    $operations = ['+', '-', '*'];
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    $operation = $operations[rand(0, 2)];
    if ($operation === '+') {
        $rightAnswer = $number1 + $number2;
    } elseif ($operation === '-') {
        $rightAnswer = $number1 - $number2;
    } else {
        $rightAnswer = $number1 * $number2;
    }
    $questionString = "{$number1} {$operation} {$number2}";
    return array('questionString' => $questionString, 'rightAnswer' => $rightAnswer);
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

function getGCD($number1, $number2)
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
