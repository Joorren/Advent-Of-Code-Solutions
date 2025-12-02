<?php

$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), file('./files/december_01_1.csv'));

$dial = 50;
$total = 0;

foreach ($csv as $key => $line) {
    $num = (int)substr($line[0], 1);
    $dial += (str_starts_with($line[0], 'R') ? $num : -$num);

    while ($dial > 99) {
        $dial -= 100;
    }

    while ($dial < 0) {
        $dial += 100;
    }

    if ($dial === 0) {
        $total++;
        echo "\r\nTotal: $total";
    }

    echo "\r\n$num: $dial";
}

echo "\r\nTotal: $total";