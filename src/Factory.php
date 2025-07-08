<?php

namespace WordSearch;

class Factory
{
    /**
     * Create a puzzle.
     *
     * @param array   $words List of words.
     * @param integer $size  Grid size.
     * @param string  $lang  Language.
     * @return Puzzle
     */
    public static function create(array $words, $size = 15, $lang = 'en')
    {
        $alphabet = ($lang == 'fi') ? new Alphabet\Finnish() : null;
        $generator = new Generator($words, $size, $alphabet);
        return $generator->generate();
    }
}
