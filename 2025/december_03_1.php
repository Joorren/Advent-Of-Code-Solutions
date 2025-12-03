<?php

$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), file('./files/december_03_1.csv'));
$total = 0;

foreach ($csv as $key => $line) {
    $splitLine = str_split($line[0]);
    $duplicate = $splitLine;
    array_pop($duplicate);

    $first = max($duplicate);
    $firstKey = array_find_key($splitLine, fn($val) => $val === $first);

    $last = max(array_slice($splitLine, -count($splitLine)+$firstKey+1));

    $total += (int)($first . $last);
}

echo $total;
echo "\r\n";