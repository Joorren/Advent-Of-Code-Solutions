<?php

$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), file('./files/december_05_1.csv'));
$total = 0;

$ranges = [];
$items = [];

foreach ($csv as $key => $line) {
    if (!$line[0]) {
        break;
    }

    $ranges[] = explode('-', $line[0]);
}

foreach ($ranges as $range) {
    if (count($items)) {
        $overlap = false;
        $overlaps = [];
        foreach ($items as $key => $item) {
            if ($range[0]-1 <= $item[1] && $range[1]+1 >= $item[0]) {
                $overlaps['min'][] = $item[0];
                $overlaps['max'][] = $item[1];
                unset($items[$key]);
            }
        }

        if (count($overlaps) > 0) {
            $overlaps['min'][] = $range[0];
            $overlaps['max'][] = $range[1];

            $items[] = [
                min($overlaps['min']),
                max($overlaps['max'])
            ];
            continue;
        }
    }

    $items[] = $range;
}

foreach ($items as $item) {
    $total += ($item[1] - $item[0] + 1);
}

echo $total;
echo "\r\n";