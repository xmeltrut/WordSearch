<?php

namespace WordSearch;

class Utils
{
    /**
     * Take an integer and convert it into an array of shuffled options.
     *
     * @param integer $num Maximum index.
     * @return array
     */
    public static function integerAsOptions($num)
    {
        $options = [];

        for ($i = 0; $i <= $num; $i++) {
            $options[] = $i;
        }

        shuffle($options);

        return $options;
    }

    /**
     * Get the length of a string.
     *
     * @param string $str String.
     * @return integer
     */
    public static function stringLength($str)
    {
        if (function_exists('mb_strlen')) {
            return mb_strlen($str);
        }

        return strlen($str);
    }

    /**
     * Convert a string to an array of letters.
     *
     * @param string $str String.
     * @return array
     */
    public static function stringToArray($str)
    {
        $arr = [];

        for ($i = 0; $i < self::stringLength($str); $i++) {
            $arr[] = function_exists('mb_substr') ? mb_substr($str, $i, 1) : $str[$i];
        }

        return $arr;
    }

    /**
     * Convert a string to uppercase.
     *
     * @param string $str String.
     * @return string
     */
    public static function uppercaseString($str)
    {
        if (function_exists('mb_strtoupper')) {
            return mb_strtoupper($str, 'UTF-8');
        }

        return strtoupper($str);
    }
}
