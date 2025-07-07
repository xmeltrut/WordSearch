<?php

namespace WordSearch\Transformer;

use WordSearch\Puzzle;

/**
 * Transform a puzzle into HTML.
 */
class HtmlTransformer
{
    /**
     * Constructor. Expects a Puzzle.
     *
     * @param Puzzle $puzzle Puzzle.
     */
    public function __construct(protected Puzzle $puzzle)
    {
    }

    /**
     * Transform the grid.
     *
     * @return string
     */
    public function grid(): string
    {
        $html = "<table class=\"word-search\">\n";

        foreach ($this->puzzle->toArray() as $row) {
            $html .= "<tr>\n";
            foreach ($row as $cell) {
                $html .= sprintf("<td>%s</td>\n", $cell);
            }
            $html .= "</tr>\n";
        }

        $html .= "</table>\n";

        return $html;
    }

    /**
     * Transform the words list.
     *
     * @return string
     */
    public function wordList(): string
    {
        $html = "<ul>\n";

        foreach ($this->puzzle->getWordList() as $word) {
            $html .= sprintf("<li>%s</li>\n", $word->word);
        }

        $html .= "</ul>\n";

        return $html;
    }
}
