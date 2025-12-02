<?php

$csv = array_map('str_getcsv', file('./files/december_01_1.csv'));
$prev = null;
$total = 0;

foreach ($csv as $key => $number) {
    if (array_key_exists($key-2, $csv)) {
        $curr = (int)$csv[$key-2][0] + (int)$csv[$key-1][0] + (int)$number[0];
        if ($prev !== null && $prev < $curr) {
            $total++;
        }
        $prev = $curr;
    }
}

echo $total;