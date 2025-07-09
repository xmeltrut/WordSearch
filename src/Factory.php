<?php

namespace WordSearch;

class Factory
{

  /**
   * Create a puzzle.
   *
   * @param array $words List of words.
   * @param integer $size Grid size.
   * @param string $lang Language.
   *
   * @return Puzzle
   * @throws \WordSearch\Exception
   */
    public static function create(array $words, int $size = 15, string $lang = 'en'): Puzzle {
        $alphabet = ($lang == 'fi') ? new Alphabet\Finnish() : null;
        $generator = new Generator($words, $size, $alphabet);
        return $generator->generate();
    }
}
