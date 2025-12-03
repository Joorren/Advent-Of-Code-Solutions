<?php

$csv = array_map(fn($line) => str_getcsv($line, ',', '"', '\\'), file('./files/december_02_1.csv'));
$total = 0;

foreach ($csv as $key => $line) {
    foreach ($line as $range) {
        $range = explode('-', $range);
        $num = (int)$range[0];

        while ($num <= (int)$range[1]) {
            $numLen = strlen($num);
            for ($i = 1; $i <= $numLen / 2; $i++) {
                if ($numLen % $i === 0) {
                    $nums = str_split($num, $i);
                    if (count($nums) > 1 && count(array_unique($nums)) === 1) {
                        $total+= $num;
                        break;
                    }
                }
            }
            $num++;
        }
    }
}

echo $total;
echo "\r\n";
