<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\game;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';
const MINNUMBER = 1;
const MAXNUMBER = 100;

function start(): void
{
    $getGameData = function (): array {
        $number = rand(MINNUMBER, MAXNUMBER);
        $rightAnswer = ($number % 2) === 0 ? 'yes' : 'no';
        return array('question' => $number, 'rightAnswer' => $rightAnswer, 'task' => TASK);
    };
    game($getGameData);
}
