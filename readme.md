Word Search
===========

Word search generator.

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
