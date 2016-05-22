<?php

namespace WordSearch;

/**
 * Represents a list of words in a puzzle.
 */
class WordList implements \Iterator, \Countable
{
    /**
     * @var array Word list
     */
    private $words = [];

    /**
     * @var integer Position
     */
    private $position = 0;

    /**
     * Add a word.
     *
     * @param string  $word   Word.
     * @param integer $row    Row.
     * @param integer $column Column.
     * @return void
     */
    public function add($word, $row, $column)
    {
        $this->words[] = new Word($word, $row, $column);
    }

    /**
     * Count the number of words.
     *
     * @return integer
     */
    public function count()
    {
        return count($this->words);
    }

    /**
     * Rewind the position.
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Get current position.
     *
     * @return integer
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Move to next object.
     *
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Is the current position valid?
     *
     * @return boolean
     */
    public function valid()
    {
        return isset($this->words[$this->position]);
    }

    /**
     * Get current object in iteration.
     *
     * @return Word
     */
    public function current()
    {
        return $this->words[$this->position];
    }

    /**
     * String representation.
     *
     * @return string
     */
    public function __toString()
    {
        $str = '';
        $wordLength = 1;

        foreach ($this->words as $word) {
            if (strlen($word->word) > $wordLength) {
                $wordLength = strlen($word->word);
            }
        }

        $pattern = "%-" . $wordLength . "s | %-3s | %-6s\n";

        $str .= sprintf($pattern, 'Word', 'Row', 'Column');

        foreach ($this->words as $word) {
            $str .= sprintf(
                $pattern,
                $word->word,
                $word->row,
                $word->column
            );
        }

        return $str;
    }
}
