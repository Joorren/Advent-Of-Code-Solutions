<?php

$csv = array_map('str_getcsv', file('./files/december_02_1.csv'));
$score = 0;

foreach ($csv as $key => $line) {
    $round = explode(' ', $line[0]);
    match ($round[1]) {
        'X' => [
            match ($round[0]) {
                'A' => $score += 3,
                'B' => $score += 1,
                'C' => $score += 2,
            },
        ],
        'Y' => [
            $score += 3,
            match ($round[0]) {
                'A' => $score += 1,
                'B' => $score += 2,
                'C' => $score += 3,
            },
        ],
        'Z' => [
            $score += 6,
            match ($round[0]) {
                'A' => $score += 2,
                'B' => $score += 3,
                'C' => $score += 1,
            },
        ],
    };
}

print_r($score);