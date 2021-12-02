<?php

$csv = array_map('str_getcsv', file('./files/december_02_1.csv'));
$coords = [0, 0, 0];

foreach ($csv as $item) {
    $info = explode(' ', $item[0]);
    switch ($info[0]) {
        case 'forward':
            $coords[0] += $info[1];
            $coords[1] += $info[1] * $coords[2];
            break;
        case 'down':
            $coords[2] += $info[1];
            break;
        case 'up':
            $coords[2] -= $info[1];
            break;
    }
}

echo $coords[0] . ', ' . $coords[1] . ', ' . ($coords[0] * $coords[1]);
