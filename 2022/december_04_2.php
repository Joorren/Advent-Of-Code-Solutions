<?php

$csv = array_map('str_getcsv', file('./files/december_04_1.csv'));
$overlaps = 0;

foreach ($csv as $key => $line) {
    $pair = [explode('-', $line[0]), explode('-', $line[1])];
    if (
        ($pair[0][0] >= $pair[1][0] && $pair[0][1] <= $pair[1][1]) ||
        ($pair[0][0] <= $pair[1][0] && $pair[0][1] >= $pair[1][1]) ||
        ($pair[0][0] <= $pair[1][0] && $pair[0][1] >= $pair[1][0] && $pair[0][1] <= $pair[1][1]) ||
        ($pair[0][0] >= $pair[1][0] && $pair[0][0] <= $pair[1][1] && $pair[0][1] >= $pair[1][1])
    ) {
        $overlaps++;
    }
}

print_r($overlaps);