<?php

$csv = array_map('str_getcsv', file('./files/december_02_1.csv'));
$score = 0;

foreach ($csv as $key => $line) {
    $round = explode(' ', $line[0]);
    match ($round[1]) {
        'X' => [
            $score += 1,
            match ($round[0]) {
                'A' => $score += 3,
                'B' => $score += 0,
                'C' => $score += 6,
            },
        ],
        'Y' => [
            $score += 2,
            match ($round[0]) {
                'A' => $score += 6,
                'B' => $score += 3,
                'C' => $score += 0,
            },
        ],
        'Z' => [
            $score += 3,
            match ($round[0]) {
                'A' => $score += 0,
                'B' => $score += 6,
                'C' => $score += 3,
            },
        ],
    };
}

print_r($score);