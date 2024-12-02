<?php

$csv = array_map('str_getcsv', file('./files/december_01_1.csv'));
$total = 0;
$left = [];
$right = [];

foreach ($csv as $key => $line) {
    $numbers = explode('   ', $line[0]);

    $left[] = $numbers[0];
    $right[] = $numbers[1];
}

sort($left);
sort($right);

for ($i = 0; $i < count($left); $i++) {
    $total += abs($left[$i] - $right[$i]);
}

echo $total;