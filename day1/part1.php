<?php

$filename = "./input.txt";
$lines = file($filename);

$list1 = [];
$list2 = [];

$sum = 0;

foreach ($lines as $line) {
    list($a, $b) = explode("   ", $line);
    $list1[] = intval($a);
    $list2[] = intval($b);
}
sort($list1);
sort($list2);
$pairs = array_map(null, $list1, $list2);

foreach ($pairs as $pair) {
    $sum += abs($pair[0] - $pair[1]);
}

echo $sum;
