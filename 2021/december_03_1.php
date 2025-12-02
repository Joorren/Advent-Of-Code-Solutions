<?php

$csv = array_map('str_getcsv', file('./files/december_03_1.csv'));
$gamma_bits = '';
$epsilon_bits = '';

for ($i = 0, $iMax = strlen($csv[0][0]); $i < $iMax; $i++) {
    $curr_bits = [];
    for ($j = 0, $jMax = count($csv); $j < $jMax; $j++) {
        $curr_bits[] = $csv[$j][0][$i];
    }
    $values = array_count_values($curr_bits);
    $gamma_bits .= $values['0'] > $values['1'] ? '0' : '1';
    $epsilon_bits .= $values['0'] < $values['1'] ? '0' : '1';
}

var_dump($gamma_bits);
var_dump($epsilon_bits);

$gamma = bindec((int)$gamma_bits);
$epsilon = bindec((int)$epsilon_bits);

var_dump($gamma);
var_dump($epsilon);

var_dump($gamma * $epsilon);