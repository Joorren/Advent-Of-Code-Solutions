<?php

$csv = array_map('str_getcsv', file('./files/december_02_1.csv'));
$score = 0;

foreach ($csv as $key => $line) {
    $round = explode(' ', $line[0]);
    if (
        (
            $round[0] === 'A' &&
            $round[1] === 'X'
        ) ||
        (
            $round[0] === 'B' &&
            $round[1] === 'Y'
        ) ||
        (
            $round[0] === 'C' &&
            $round[1] === 'Z'
        )
    ) {
        $score += 3;
    } elseif (
        (
            $round[0] === 'A' &&
            $round[1] === 'Y'
        ) ||
        (
            $round[0] === 'B' &&
            $round[1] === 'Z'
        ) ||
        (
            $round[0] === 'C' &&
            $round[1] === 'X'
        )
    ) {
        $score += 6;
    }

    $score += match ($round[1]) {
        'X' => 1,
        'Y' => 2,
        'Z' => 3,
    };
}

print_r($score);