<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\game;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function start(): void
{
    $getGameData = function (int $minNumber = 1, int $maxNumber = 100): array {
        $number = rand($minNumber, $maxNumber);
        $rightAnswer = ($number % 2) === 0 ? 'yes' : 'no';
        return array('question' => $number, 'rightAnswer' => $rightAnswer, 'task' => TASK);
    };
    game($getGameData);
}
