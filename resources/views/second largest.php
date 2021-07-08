<?php
$array = [10, 3, 5, 6, 2, 6, 3, 10];
$max = $smax = 0;

// $length = count($array);

for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] > $max) {
        $smax = $max;
        $max = $array[$i];
    } else if ($array[$i] > $smax && $array[$i] != $max) {
        $smax = $array[$is];
    }
}
echo "max" . $max . "smax" . $smax;