<?php

$file = file('./files/december_03_1.csv');
$total = 0;
$enabled = true;

foreach ($file as $key => $line) {
    $matches = [];
    preg_match_all('/mul\((\d{1,3}),(\d{1,3})\)|don\'t\(\)|do\(\)/', $line, $matches);

    for ($i = 0; $i < count($matches[0]); $i++) {
        switch ($matches[0][$i]) {
            case 'don\'t()':
                $enabled = false;
                break;
            case 'do()':
                $enabled = true;
                break;
            default:
                if ($enabled) {
                    $total += $matches[1][$i] * $matches[2][$i];
                }
        }
    }
}

echo $total;