<?php

$filename = "./input.txt";
$lines = file($filename);


$num_safe = 0;

foreach ($lines as $line) {
    $nums = explode(" ", $line);
    if ($nums[0] > $nums[1]) {
        $nums = array_reverse($nums);
    }
    foreach ($nums as $index => $num) {
        if (array_key_exists($index + 1, $nums)) {
            if (!($nums[$index + 1] - $num <= 3 && $nums[$index + 1] - $num >= 1)) {
                break;
            }
        } else {
            echo "safe\n";
            $num_safe += 1;
        }
    }
}

echo "$num_safe\n";
