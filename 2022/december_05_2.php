<?php

$csv = array_map('str_getcsv', file('./files/december_05_1.csv'));
$stacks = [];
$step = 0;

foreach ($csv as $key => $line) {
    if ($step === 0) {
        if (empty($line[0])) {
            ksort($stacks);
            $step++;
            continue;
        }

        if (!str_contains($line[0], '[')) {
            continue;
        }

        $position = 0;
        while ($position < strlen($line[0]) / 4) {
            $letter = substr($line[0], ($position * 4) + 1, 1);
            if ($letter !== ' ') {
                $stacks[$position][] = $letter;
            }
            $position++;
        }
    } else {
        preg_match_all('/\d+/', $line[0], $numbers);
        $number = array_slice($stacks[$numbers[0][1] - 1], 0, $numbers[0][0]);
        $stacks[$numbers[0][1] - 1] = array_slice($stacks[$numbers[0][1] - 1], $numbers[0][0]);
        $stacks[$numbers[0][2] - 1] = array_merge($number, $stacks[$numbers[0][2] - 1]);
    }
}

foreach ($stacks as $stack) {
    print_r($stack[0]);
}