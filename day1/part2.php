<?php

$filename = "./input.txt";
$lines = file($filename);

$list1 = [];
$list2 = [];

foreach ($lines as $line) {
    list($a, $b) = explode("   ", $line);
    $list1[] = intval($a);
    $b = intval($b);
    if (!array_key_exists($b, $list2)) {
        $list2[$b] = 0;
    }
    $list2[$b]++;
}

$result = 0;
foreach ($list1 as $num) {
    if (array_key_exists($num, $list2)) {
        $result += $num * $list2[$num];
    }
}

echo "$result\n";
