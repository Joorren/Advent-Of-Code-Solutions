<?php

$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), file('./files/december_02_1.csv'));
$total = 0;

foreach ($csv as $key => $line) {
    foreach ($line as $range) {
        $range = explode('-', $range);
        $num = (int)$range[0];

        while ($num <= (int)$range[1]) {
            $numLen = strlen($num);
            if ($numLen % 2 === 0) {
                $nums = str_split($num, $numLen / 2);
                if ($nums[0] === $nums[1]) {
                    $total+= $num;
                }
            }
            $num++;
        }
    }
}

echo $total;
echo "\r\n";
