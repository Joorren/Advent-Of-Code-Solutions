<?php

$csv = array_map('str_getcsv', file('./files/december_03_1.csv'));
$score = 0;
$group = [];

foreach ($csv as $key => $line) {
    $rucksack = $line[0];
    $group[] = $rucksack;
    if (count($group) === 3) {
        foreach (str_split($group[0]) as $letter) {
            if (in_array($letter, str_split($group[1])) && in_array($letter, str_split($group[2]))) {
                $score += ord($letter) - ord(ctype_upper($letter) ? 'A' : 'a') + 1 + (ctype_upper($letter) ? 26 : 0);
                break;
            }
        }
        $group = [];
    }
}

print_r($score);