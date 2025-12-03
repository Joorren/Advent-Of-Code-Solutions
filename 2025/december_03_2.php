<?php

$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), file('./files/december_03_1.csv'));
$total = 0;

foreach ($csv as $key => $line) {
    $splitLine = str_split($line[0]);

    $total += recursive_find_largest_number($splitLine, 12);
}

echo $total;
echo "\r\n";

function recursive_find_largest_number(array $numbers, int $length): int
{
    $length--;
    $end = $length > 0 ? -$length : count($numbers);
    $largest = max(array_slice($numbers, 0, $end));
    $key = array_find_key($numbers, fn($val) => $val === $largest);

    if ($length > 0) {
        return (int) ($largest . recursive_find_largest_number(array_slice($numbers, $key + 1), $length));
    }

    return (int)$largest;
}