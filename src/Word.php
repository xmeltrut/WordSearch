<?php

namespace WordSearch;

/**
 * Represents a word in a puzzle.
 */
class Word
{
    public $word;
    public $row;
    public $column;

    /**
     * Constructor.
     *
     * @param string  $word   Word.
     * @param integer $row    Row.
     * @param integer $column Column.
     */
    public function __construct($word, $row, $column)
    {
        $this->word = $word;
        $this->row = $row;
        $this->column = $column;
    }
}
