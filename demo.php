<?php

require 'vendor/autoload.php';

$puzzle = WordSearch\Factory::create(
    ['foo', 'bar', 'hello', 'world'],
    5,
    'fi'
);

echo "PUZZLE\n\n";
echo $puzzle;
echo "\nANSWERS\n\n";
echo $puzzle->getWordList();
