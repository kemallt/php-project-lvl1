<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function greetings(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function game(callable $getGameData): void
{
    $name = greetings();
    for ($i = 0; $i < ROUNDS; $i++) {
        $gameData = $getGameData();
        ['question' => $question, 'rightAnswer' => $rightAnswer, 'task' => $task] = $gameData;
        line($task);
        $answer = prompt("Question: {$question}");
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
