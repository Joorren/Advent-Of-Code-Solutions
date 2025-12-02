<?php

$csv = array_map('str_getcsv', file('./files/december_01_1.csv'));
$calories = [];
$currentCalories = 0;

foreach ($csv as $key => $line) {
    if (empty($line[0])) {
        $calories[] = $currentCalories;
        $currentCalories = 0;
        continue;
    }

    $currentCalories += (int)$line[0];
}

$calories[] = $currentCalories;

sort($calories, SORT_NUMERIC);

print_r(array_sum(array_slice($calories, -3)));