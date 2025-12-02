<?php

$csv = array_map('str_getcsv', file('./files/december_01_1.csv'));
$prev = null;
$total = 0;

foreach ($csv as $key => $number) {
    $curr = (int)$number[0];
    if ($prev !== null && $prev < $curr) {
        $total++;
    }
    $prev = $curr;
}

echo $total;

