<?php

$csv = array_map('str_getcsv', file('./files/december_03_1.csv'));
$score = 0;

foreach ($csv as $key => $line) {
    $rucksack = [substr($line[0], 0,strlen($line[0])/2), substr($line[0], strlen($line[0])/2)];
    foreach (str_split($rucksack[0]) as $letter) {
        if (in_array($letter, str_split($rucksack[1]))) {
            $score += ord($letter) - ord(ctype_upper($letter) ? 'A' : 'a') + 1 + (ctype_upper($letter) ? 26 : 0);
            break;
        }
    }
}

print_r($score);