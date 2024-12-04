<?php

$filename = "./input.txt";
$lines = file($filename);

$safes = [];

foreach ($lines as $line_index => $line) {
    $nums = explode(" ", $line);

    // Brute force perform part1 against a copy of each line with one element removed
    for ($i = 0; $i < count($nums); $i++) {
        $nums_copy = $nums;
        array_splice($nums_copy, $i, 1);
        if ($nums_copy[0] > $nums_copy[1]) {
            $nums_copy = array_reverse($nums_copy);
        }
        foreach ($nums_copy as $index => $num) {
            if (array_key_exists($index + 1, $nums_copy)) {
                if (!($nums_copy[$index + 1] - $num <= 3 && $nums_copy[$index + 1] - $num >= 1)) {
                    break;
                }
            } else {
                $safes[$line_index] = true;
            }
        }
    }
}

$num_safe = count($safes);
echo "$num_safe\n";
