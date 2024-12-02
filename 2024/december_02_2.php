<?php

$csv = array_map('str_getcsv', file('./files/december_02_1.csv'));
$total = 0;

foreach ($csv as $key => $line) {
    $levels = array_map('intval', explode(' ', $line[0]));

    if (isSafe($levels)) {
        $total++;
    } else {
        foreach ($levels as $i => $level) {
            $clone = $levels;
            unset($clone[$i]);
            $clone = array_values($clone);

            if (isSafe($clone)) {
                $total++;
                break;
            }
        }
    }

}

echo $total;

function isSafe($levels): bool
{
    $should_increment = $levels[0] < $levels[1];

    for ($i = 1; $i < count($levels); $i++) {
        $diff = abs($levels[$i] - $levels[$i - 1]);
        if (
            ($should_increment && $levels[$i] < $levels[$i - 1])
            || (!$should_increment && $levels[$i] > $levels[$i - 1])
            || ($diff < 1 || $diff > 3)
        ){
            return false;
        }
    }

    return true;
}