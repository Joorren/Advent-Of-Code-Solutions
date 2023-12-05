<?php

$file = file('./files/december_02_1.csv');
$total = 0;

foreach ($file as $key => $line) {
    list($game, $input) = explode(':', $line);
    $minCubes = [
        'red' => 0,
        'green' => 0,
        'blue' => 0,
        ];

    $picks = explode(';', $input);

    foreach ($picks as $pick) {
        $options = explode(',', $pick);

        foreach ($options as $option) {
            list($amount, $colour) = explode(' ', trim($option));

            if ($colour === 'red' && $amount > $minCubes['red']) {
                $minCubes['red'] = $amount;
            } elseif ($colour === 'green' && $amount > $minCubes['green']) {
                $minCubes['green'] = $amount;
            } elseif ($colour === 'blue' && $amount > $minCubes['blue']) {
                $minCubes['blue'] = $amount;
            }
        }
    }

    $total+= array_product($minCubes);
}

echo $total;