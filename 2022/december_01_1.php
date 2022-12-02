<?php

$csv = array_map('str_getcsv', file('./files/december_01_1.csv'));
$mostCalories = 0;
$currentCalories = 0;

foreach ($csv as $key => $line) {
    if (empty($line[0])) {
        if ($currentCalories > $mostCalories) {
            $mostCalories = $currentCalories;
        }
        $currentCalories = 0;
        continue;
    }

    $currentCalories += (int)$line[0];
}

if ($currentCalories > $mostCalories) {
    $mostCalories = $currentCalories;
}

print_r($mostCalories);