<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Brain\Games\Engine;

$game = new Engine();
$game->start('progression');
