<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function start(string $type): void
{
    $name = greetings();
    game($type, $name);
}

function greetings(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function game(string $type, string $name): void
{
    for ($i = 0; $i < 3; $i++) {
        if ($type === 'even') {
            $pars = \Brain\Games\Even\getPars();
        } elseif ($type === 'calc') {
            $pars = \Brain\Games\Calc\getPars();
        } elseif ($type === 'gcd') {
            $pars = \Brain\Games\Gcd\getPars();
        } elseif ($type === 'progression') {
            $pars = \Brain\Games\Progression\getPars();
        } elseif ($type === 'prime') {
            $pars = \Brain\Games\Prime\getPars();
        } else {
            $pars = array('questionString' => '', 'rightAnswer' => '', 'task' => '');
        }
        ['questionString' => $questionString, 'rightAnswer' => $rightAnswer, 'task' => $task] = $pars;
        line($task);
        $answer = prompt("Question: {$questionString}");
        if ($answer == $rightAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $rightAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
