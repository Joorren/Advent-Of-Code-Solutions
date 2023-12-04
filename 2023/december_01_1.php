<?php

$csv = array_map('str_getcsv', file('./files/december_01_1.csv'));
$total = 0;

foreach ($csv as $key => $line) {
    $numbers = array_values(array_filter(array_map('intval', str_split($line[0])), fn($val) => !empty($val)));
    if (!empty($numbers)) {
        $total += (int)($numbers[0] . $numbers[count($numbers)-1]);
    }
}

echo $total;