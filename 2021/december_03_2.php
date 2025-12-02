<?php

$csv = array_map('str_getcsv', file('./files/december_03_1.csv'));

$oxygen_ids = [];
$scrubber_ids = [];

$first_bits = [];
for ($j = 0, $jMax = count($csv); $j < $jMax; $j++) {
    $first_bits[] = $csv[$j][0][0];
}
$first_values = array_count_values($first_bits);

if ($first_values['0'] > $first_values['1']) {
    foreach ($csv as $row) {
        if ($row[0][0] === '0') {
            $oxygen_ids[] = $row[0];
        } else {
            $scrubber_ids[] = $row[0];
        }
    }
} else {
    foreach ($csv as $row) {
        if ($row[0][0] === '1') {
            $oxygen_ids[] = $row[0];
        } else {
            $scrubber_ids[] = $row[0];
        }
    }
}

while (count($oxygen_ids) > 1) {
    for ($i = 0, $iMax = strlen($oxygen_ids[0]); $i < $iMax; $i++) {
        $curr_bits = [];
        $new_oxygen_ids = [];

        foreach ($oxygen_ids as $oxygen_id) {
            $curr_bits[] = $oxygen_id[$i];
        }
        $values = array_count_values($curr_bits);
        if (!isset($values['1']) || (isset($values['0']) && $values['0'] > $values['1'])) {
            foreach ($oxygen_ids as $oxygen_id) {
                if ($oxygen_id[$i] === '0') {
                    $new_oxygen_ids[] = $oxygen_id;
                }
            }
        } else {
            foreach ($oxygen_ids as $oxygen_id) {
                if ($oxygen_id[$i] === '1') {
                    $new_oxygen_ids[] = $oxygen_id;
                }
            }
        }
        $oxygen_ids = $new_oxygen_ids;
    }
}

while (count($scrubber_ids) > 1) {
    for ($i = 0, $iMax = strlen($scrubber_ids[0]); $i < $iMax; $i++) {
        $curr_bits = [];
        $new_scrubber_ids = [];

        foreach ($scrubber_ids as $scrubber_id) {
            $curr_bits[] = $scrubber_id[$i];
        }

        $values = array_count_values($curr_bits);

        if (isset($values['0']) && (!isset($values['1']) || $values['0'] <= $values['1'])) {
            foreach ($scrubber_ids as $scrubber_id) {
                if ($scrubber_id[$i] === '0') {
                    $new_scrubber_ids[] = $scrubber_id;
                }
            }
        } else {
            foreach ($scrubber_ids as $scrubber_id) {
                if ($scrubber_id[$i] === '1') {
                    $new_scrubber_ids[] = $scrubber_id;
                }
            }
        }
        $scrubber_ids = $new_scrubber_ids;
    }
}

var_dump($oxygen_ids);
var_dump($scrubber_ids);

$oxygen = bindec((int)$oxygen_ids[0]);
$scrubber = bindec((int)$scrubber_ids[0]);

var_dump($oxygen);
var_dump($scrubber);

var_dump($oxygen * $scrubber);