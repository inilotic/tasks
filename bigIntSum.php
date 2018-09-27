<?php

/**
 * У вас нет доступа к библиотекам для работы с большими числами. Дано два положительных целых числа в виде строки. Числа могут быть очень большими, могут не поместиться в 64 битный integer.
 * sum for bit int, bigger than 64 bit integers
 * @param string $x
 * @param string $y
 * @return string
 */
function bigIntSum($x, $y)
{
    //reverse strings
    $revX = strrev($x);
    $revY = strrev($y);
    $lenX = strlen($revX);
    $lenY = strlen($revY);

    $lim = $lenX < $lenY ? $lenY : $lenX;
    $sum = [];
    $hOrd = 0;
    for ($i = 0; $i < $lim; $i++) {
        $arg1 = $revX[$i] ?? 0;
        $arg2 = $revY[$i] ?? 0;
        $iterSum = $arg1 + $arg2 + $hOrd;

        if ($iterSum >= 10) {
            $hOrd = 1;
            $iterSum = $iterSum - 10;
        } else {
            $hOrd = 0;
        }
        $sum[] = $iterSum;
    }
    //check hOrd
    if ($hOrd != 0) {
        $sum[] = $hOrd;
    }

    $result = implode("", array_reverse($sum));
    return $result;
}