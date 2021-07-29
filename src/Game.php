<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class Game
{
    private $name;

    public function start()
    {
        $this->greetings();
        $this->even();
    }

    public function greetings()
    {
        line('Welcome to the Brain Game!');
        $this->name = prompt('May I have your name?');
        line("Hello, %s!", $this->name);
    }

    public function even()
    {
        $task = 'Answer "yes" if the number is even, otherwise answer "no".';
        $count = 0;
        line($task);
        for ($i=0; $i < 3; $i++) {
            $number = rand();
            $isEven = ($number % 2) === 0 ? 'yes' : 'no';
            $answer = prompt("Question: {$number}");
            if ($answer === $isEven) {
                line("Correct!");
            } else {
                line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $isEven);
                line("Let's try again, %s", $this->name);
                return;
            }
        }
        line("Congratulations, %s!", $this->name);
    }
}
