<?php

/**
 * Created by Stefano
 * Date: 31/10/2016
 */
abstract class Utility
{
    public static function cleanString($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]*/', '-', $string); // Replace special chars with hyphens.
    }
}