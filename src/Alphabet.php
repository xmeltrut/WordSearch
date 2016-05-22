<?php

namespace WordSearch;

abstract class Alphabet
{
    protected $alphabet;

    /**
     * Constructor. Ensure we have an alphabet.
     */
    final public function __construct()
    {
        if (!is_array($this->alphabet) || (count($this->alphabet) == 0)) {
            throw new Exception('No alphabet configured.');
        }
    }

    /**
     * Return a random letter.
     *
     * @return string
     */
    public function randomLetter()
    {
        return strtoupper($this->alphabet[mt_rand(0, count($this->alphabet) - 1)]);
    }
}
