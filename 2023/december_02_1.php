<?php

$file = file('./files/december_02_1.csv');
$total = 0;

$limit = [
    'red' => 12,
    'green' => 13,
    'blue' => 14,
];

foreach ($file as $key => $line) {
    list($game, $input) = explode(':', $line);
    $gameId = (int)substr($game, 5 - strlen($game));

    $picks = explode(';', $input);

    foreach ($picks as $pick) {
        $options = explode(',', $pick);

        foreach ($options as $option) {
            list($amount, $colour) = explode(' ', trim($option));

            if (
                ($colour === 'red' && (int)$amount > $limit['red'])
                || ($colour === 'green' && (int)$amount > $limit['green'])
                || ($colour === 'blue' && (int)$amount > $limit['blue'])
            ) {
                continue 3;
            }
        }
    }

    $total+= $gameId;
}

echo $total;