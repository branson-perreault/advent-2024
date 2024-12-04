<?php

$filename = "./input.txt";
$lines = file($filename);

$regex = '/(mul\(\d+,\d+\))/';
$result = 0;

foreach ($lines as $line) {
    preg_match_all($regex, $line, $matches);
    foreach ($matches[0] as $match) {
        echo "$match\n";
        list($a, $b) = explode(",", ltrim(rtrim($match, ")"), "mul("));
        $result += intval($a) * intval($b);
    }
}

echo "$result\n";

