<?php

$csv = array_map('str_getcsv', file('./files/december_06_1.csv'));
$letters = [];
$dataStream = str_split($csv[0][0]);

foreach ($dataStream as $key => $letter) {
    if (count($letters) === 4) {
        array_shift($letters);
    }
    $letters[] = $letter;
    if (count($letters) === 4 && array_unique($letters) === $letters) {
        print_r(implode('', $letters));
        print_r($key + 1);
        break;
    }
}