<?php

require 'vendor/autoload.php';

$puzzle = WordSearch\Factory::create(
    ['föö', 'bar', 'hellö', 'wörld'],
    5,
    'fi'
);

echo "PUZZLE\n\n";
echo $puzzle;
echo "\nANSWERS\n\n";
echo $puzzle->getWordList();
