<?php

if(file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
} else if(file_exists(__DIR__ . '/../../autoload.php')) {
    require_once __DIR__ . '/../../autoload.php';
} else {
    file_put_contents('php://stderr', 'Failed to load dependencies. Did you run composer install/update?');
}

use Zend\Console\Console;
use Zend\Crypt\Password\Bcrypt;
use Zend\Console\ColorInterface as Color;

$console = Console::getInstance();

// Obtain console params (inspired by https://github.com/weierophinney/changelog_generator/blob/master/changelog_generator.php)
try {
    $opts = new Zend\Console\Getopt(array(
        'help|h'    => 'Help',
        'text|t-s' => 'Text to hash',
    ));
    $opts->parse();
} catch (Zend\Console\Exception\ExceptionInterface $e) {
    file_put_contents('php://stderr', $e->getUsageMessage());
    exit(1);
}

// Print help message if asked or nothing is asked
if(isset($opts->h) || $opts->toArray() == array()) {
    file_put_contents('php://stdout', $opts->getUsageMessage());
    exit(0);
}

$bcrypt = new Bcrypt();

if(isset($opts->t)) {
    $console->writeLine($bcrypt->create($opts->t), Color::GREEN);
}