<?php

$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), file('./files/december_04_1.csv'));
$total = 0;

$grid = [];

foreach ($csv as $key => $line) {
    $grid[] = str_split($line[0]);
}

foreach ($grid as $y => $row) {
    foreach ($row as $x => $col) {
        if ($col === '@') {
            $adjacent = [
                $row[$x-1] ?? '.',
                $row[$x+1] ?? '.',
                $grid[$y-1][$x-1] ?? '.',
                $grid[$y-1][$x] ?? '.',
                $grid[$y-1][$x+1] ?? '.',
                $grid[$y+1][$x-1] ?? '.',
                $grid[$y+1][$x] ?? '.',
                $grid[$y+1][$x+1] ?? '.',
            ];

            $valueCount = array_count_values($adjacent);
            $adjacentRolls = ($valueCount['@'] ?? 0);

            if ($adjacentRolls < 4) {
                $total++;
            }
        }
    }
}

echo $total;
echo "\r\n";
