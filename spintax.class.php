<?php 
namespace Teguh\Spintax;

/**
* Class Spintax
* @package Spintax
*/
class Spintax
{
    public static function process($text)
    {
        return preg_replace_callback(
            '/\{(((?>[^\{\}]+)|(?R))*)\}/x',
            array('Spintax', 'replace'),
            $text
        );
    }


    public static function replace($text)
    {
        $text = Spintax::process($text[1]);
        $parts = explode('|', $text);
        return $parts[array_rand($parts)];
    }
}