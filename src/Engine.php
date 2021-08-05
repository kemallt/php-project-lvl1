<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greetings(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function game(string $funcName, string $name): void
{
    for ($i = 0; $i < 3; $i++) {
        if (is_callable($funcName)) {
            $pars = $funcName();
        } else {
            line("Unknown game. Let's try again, %s!", $name);
            return;
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
