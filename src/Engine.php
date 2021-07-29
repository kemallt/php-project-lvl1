<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class Engine
{
    private $name;
    private $tasks = [];

    public function __construct()
    {
        $this->tasks = array('even' => 'Answer "yes" if the number is even, otherwise answer "no".',
                            'calc' => 'What is the result of the expression?');
    }

    public function start($type)
    {
        $this->greetings();
        $this->game($type);
    }

    public function greetings()
    {
        line('Welcome to the Brain Game!');
        $this->name = prompt('May I have your name?');
        line("Hello, %s!", $this->name);
    }

    public function game($type)
    {
        $task = $this->tasks[$type];
        line($task);
        for ($i = 0; $i < 3; $i++) {
            if ($type === 'even') {
                ['questionString' => $questionString, 'rightAnswer' => $rightAnswer] = $this->getEvenPars();
            } elseif ($type === 'calc') {
                ['questionString' => $questionString, 'rightAnswer' => $rightAnswer] = $this->getCalcPars();
            } elseif ($type === 'gcd') {
                ['questionString' => $questionString, 'rightAnswer' => $rightAnswer] = $this->getGCDPars();
            }
            $answer = prompt("Question: {$questionString}");
            if ($answer == $rightAnswer) {
                line("Correct!");
            } else {
                line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $rightAnswer);
                line("Let's try again, %s", $this->name);
                return;
            }
        }
        line("Congratulations, %s!", $this->name);
    }

    public function getGCD($number1, $number2)
    {
        $delimeters = [];
        for ($i = 1; $i <= $number1; $i++) {
            if ($number1 % $i === 0) {
                $delimeters[] = $i;
            }
        }
        print_r($delimeters);
        for ($i = count($delimeters) - 1; $i >= 0; $i--) {
            if ($number2 % $delimeters[$i] === 0) {
                return $delimeters[$i];
            }
        }
    }

    public function getGCDPars()
    {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $questionString = "{$number1} {$number2}";
        $rightAnswer = $this->getGCD($number1, $number2);
        return array('questionString' => $questionString, 'rightAnswer' => $rightAnswer);
    }

    public function getEvenPars()
    {
        $number = rand(1, 100);
        $rightAnswer = ($number % 2) === 0 ? 'yes' : 'no';
        $questionString = $number;
        return array('questionString' => $questionString, 'rightAnswer' => $rightAnswer);
    }

    public function getCalcPars()
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
}
