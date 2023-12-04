<?php

$csv = array_map('str_getcsv', file('./files/december_01_1.csv'));
$total = 0;

foreach ($csv as $key => $line) {
    print_r($line[0]);
    print_r("\r\n");
    $line[0] = str_replace(
        ['oneight','twone', 'threeight', 'fiveight', 'sevenine', 'eightwo', 'eighthree', 'nineight', 'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'],
        ['18', '21', '38', '58', '79', '82', '83', '98', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
        $line[0]
    );
    print_r($line[0]);
    print_r("\r\n");
    $numbers = array_values(array_filter(array_map('intval', str_split($line[0])), fn($val) => !empty($val)));
    if (!empty($numbers)) {
        print_r($total . ' + ');
        $total += (int)($numbers[0] . $numbers[count($numbers)-1]);
        print_r((int)($numbers[0] . $numbers[count($numbers)-1]));
        print_r(' = ' . $total);
        print_r("\r\n");
    }
}

echo $total;