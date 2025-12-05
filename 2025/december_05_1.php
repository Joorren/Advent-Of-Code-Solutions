<?php

$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), file('./files/december_05_1.csv'));
$total = 0;

$ranges = [];
$items = [];

$passedSplit = false;

foreach ($csv as $key => $line) {
    if (!$line[0]) {
        $passedSplit = true;
    } else {
        if (!$passedSplit) {
            $ranges[] = explode('-', $line[0]);
        } else {
            $items[] = (int)$line[0];
        }
    }
}

foreach ($items as $item) {
    foreach ($ranges as $range) {
        if ($item >= $range[0] && $item <= $range[1]) {
            $total++;
            break;
        }
    }
}

echo $total;
echo "\r\n";
