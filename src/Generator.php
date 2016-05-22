<?php

namespace WordSearch;

class Generator
{
    /**
     * @var array Words to insert.
     */
    private $words;

    /**
     * @var integer Size of grid.
     */
    private $size;

    /**
     * @var array Grid object.
     */
    private $grid = [];

    /**
     * @var array Track unused rows.
     */
    private $rowsAvailable = [];

    /**
     * @var array Track unused columns.
     */
    private $columnsAvailable = [];

    /**
     * @var WordList Words added.
     */
    private $wordList;

    /**
     * @var Alphabet
     */
    private $alphabet;

    /**
     * Constructor.
     *
     * @param array   $words List of words.
     * @param integer $size  Rows/columns.
     */
    public function __construct(array $words, $size = 15, Alphabet $alphabet = null)
    {
        // validate the grid size
        if (!is_numeric($size) || $size < 1) {
            throw new Exception(sprintf('Invalid size specified: %s', $size));
        }

        // remove any words that are too long
        foreach ($words as $key => $word) {
            if (strlen($word) > $size) {
                unset($words[$key]);
            }
        }

        // convert words to upper case
        array_walk($words, function (&$word) {
            $word = strtoupper($word);
        });

        // randomise words
        shuffle($words);

        // setup instance variables
        $this->words = $words;
        $this->size = $size;
        $this->wordList = new WordList;
        $this->alphabet = ($alphabet) ? $alphabet : new Alphabet\English;
    }

    /**
     * Generate the puzzle.
     *
     * @return Puzzle
     */
    public function generate()
    {
        $this->initialise();
        $this->populate();
        $this->fill();

        return new Puzzle($this->grid, $this->wordList);
    }

    /**
     * Initialise the grid.
     *
     * @return void
     */
    private function initialise()
    {
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                $this->grid[$i][$j] = null;
            }

            $this->rowsAvailable[] = $i;
            $this->columnsAvailable[] = $i;
        }
    }

    /**
     * Populate the grid with the words.
     *
     * @return void
     */
    private function populate()
    {
        foreach ($this->words as $word) {
            $rowOrColumn = rand(1, 2);

            if ($rowOrColumn == 1) {
                shuffle($this->rowsAvailable);

                foreach ($this->rowsAvailable as $key => $row) {
                    $maxStart = ($this->size - strlen($word));
                    $startOptions = Utils::integerAsOptions($maxStart);
                    foreach ($startOptions as $startIndex) {
                        if ($this->tryWordInRow($word, $row, $startIndex)) {
                            $this->insertWordIntoRow($word, $row, $startIndex);
                            unset($this->rowsAvailable[$key]);
                            break(2);
                        }
                    }
                }
            } else {
                shuffle($this->columnsAvailable);

                foreach ($this->columnsAvailable as $key => $column) {
                    $maxStart = ($this->size - strlen($word));
                    $startOptions = Utils::integerAsOptions($maxStart);
                    foreach ($startOptions as $startIndex) {
                        if ($this->tryWordInColumn($word, $column, $startIndex)) {
                            $this->insertWordIntoColumn($word, $column, $startIndex);
                            unset($this->columnsAvailable[$key]);
                            break(2);
                        }
                    }
                }
            }
        }
    }

    /**
     * Try to fit a word into a row.
     *
     * @param string  $word Word.
     * @param integer $row  Row index.
     * @param integer $col  Column index.
     */
    private function tryWordInRow($word, $row, $col)
    {
        $wordArray = Utils::stringToArray($word);

        foreach ($wordArray as $letter) {
            if ($this->grid[$row][$col] !== null &&
                $this->grid[$row][$col] !== $letter
            ) {
                return false;
            }
            $col++;
        }

        return true;
    }

    /**
     * Insert a word into a row.
     *
     * @param string  $word Word.
     * @param integer $row  Row index.
     * @param integer $col  Column index.
     */
    private function insertWordIntoRow($word, $row, $col)
    {
        $this->wordList->add($word, ($row + 1), (1 + $col));

        $wordArray = Utils::stringToArray($word);

        foreach ($wordArray as $letter) {
            $this->grid[$row][$col] = $letter;
            $col++;
        }
    }

    /**
     * Try to fit a word into a column.
     *
     * @param string  $word Word.
     * @param integer $col  Column index.
     * @param integer $row  Row index.
     */
    private function tryWordInColumn($word, $col, $row)
    {
        $wordArray = Utils::stringToArray($word);

        foreach ($wordArray as $letter) {
            if ($this->grid[$row][$col] !== null &&
                $this->grid[$row][$col] !== $letter
            ) {
                return false;
            }
            $row++;
        }

        return true;
    }

    /**
     * Insert a word into a column.
     *
     * @param string  $word Word.
     * @param integer $col  Column index.
     * @param integer $row  Row index.
     */
    private function insertWordIntoColumn($word, $col, $row)
    {
        $this->wordList->add($word, ($row + 1), ($col + 1));

        $wordArray = Utils::stringToArray($word);

        foreach ($wordArray as $letter) {
            $this->grid[$row][$col] = $letter;
            $row++;
        }
    }

    /**
     * Fill any empty slots.
     *
     * @return void
     */
    private function fill()
    {
        foreach ($this->grid as $r => $row) {
            foreach ($row as $c => $cell) {
                if ($cell === null) {
                    $this->grid[$r][$c] = $this->alphabet->randomLetter();
                }
            }
        }
        // fill them
    }
}
