<?php

/**
 * Learn Unit Testing With Katas
 */

function arabicToRoman($number)
{
    $buffer = '';
    $arabicToRoman = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];

    foreach ($arabicToRoman as $arabic => $roman) {
        while ($number >= $arabic) {
            $buffer = $buffer . $roman;
            $number = $number - $arabic;
        }
    }

    return $buffer;
}
