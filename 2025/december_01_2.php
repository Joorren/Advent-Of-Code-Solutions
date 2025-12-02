<?php

$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), file('./files/december_01_1.csv'));

$dial = 50;
$total = 0;

foreach ($csv as $key => $line) {
    $num = (int)substr($line[0], 1);
    $dial += (str_starts_with($line[0], 'R') ? $num : -$num);

    if ($dial === 0) {
        $total++;
    } elseif ($dial > 99) {
        $total += floor($dial / 100);
        $dial = $dial % 100;
    } elseif ($dial < 0) {
        $total += ceil(abs($dial) / 100);
        $dial = $dial % 100;
        if ($dial < 0) $dial += 100;
    }

    echo "\r\n" . (str_starts_with($line[0], 'R') ? $num : -$num) . ": $dial";
}

echo "\r\nTotal: $total";