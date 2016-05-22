Word Search
===========

Word search generator written in PHP.

Features:

* Supports multiple words and grid sizes
* Supports horizontal and vertical words
* Supports intersecting words
* English and Finnish alphabets

Produces a grid for you to output, and list of answers.

    HHEOÖ
    EÖBAR
    LSJFD
    LLTOK
    OPÖOU

Install
-------

Install via Composer:

```bash
$ composer require xmeltrut/WordSearch "^1.0"
```

Usage
-----

In English:

    $puzzle = WordSearch\Factory::create(['foo', 'bar']);

In Finnish, with a custom grid size:

    $puzzle = WordSearch\Factory::create(
        ['mansikka', 'omena', banaani'],
        10,
        'fi'
    );

The `Puzzle` object contains a `toArray` method for the puzzle grid
and an iterable `WordList` object with the answers in.

Development
-----------

Tests can be run via Ant:

    ant
