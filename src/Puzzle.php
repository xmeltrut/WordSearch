<?php

namespace WordSearch;

/**
 * Represents a generated puzzle.
 */
class Puzzle
{
    /**
     * @var array Grid representation.
     */
    private $grid;

    /**
     * @var WordList Word list.
     */
    private $wordList;

    /**
     * Constructor.
     *
     * @param array    $grid     Grid.
     * @param WordList $wordList Word list.
     */
    public function __construct(array $grid, WordList $wordList)
    {
        $this->grid = $grid;
        $this->wordList = $wordList;
    }

    /**
     * Array representation.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->grid;
    }

    /**
     * String representation.
     *
     * @return string
     */
    public function __toString()
    {
        $str = '';

        foreach ($this->grid as $row) {
            $str .= sprintf("%s\n", implode($row));
        }

        return $str;
    }

    /**
     * Return the word list.
     *
     * @param array
     */
    public function getWordList()
    {
        return $this->wordList;
    }
}
