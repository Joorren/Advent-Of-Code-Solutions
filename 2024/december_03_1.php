<?php

$file = file('./files/december_03_1.csv');
$total = 0;

foreach ($file as $key => $line) {
    $matches = [];
    preg_match_all('/mul\((\d{1,3}),(\d{1,3})\)/', $line, $matches);

    for ($i = 0; $i < count($matches[0]); $i++) {
        $total += $matches[1][$i] * $matches[2][$i];
    }
}

echo $total;
