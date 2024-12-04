<?php

$filename = "./input.txt";
$lines = file($filename);

$capture_regex = '/(mul\(\d+,\d+\))/';
$result = 0;


$line = implode("", $lines);

while (str_contains($line, "don't()")) {
    $do_position = strpos($line, "do()", strpos($line, "don't()"));
    if ($do_position) {
        $line = substr($line, 0, strpos($line, "don't()")) . substr($line, $do_position + 4);
    } else {
        $line = substr($line, 0, strpos($line, "don't()"));
    }
}

preg_match_all($capture_regex, $line, $matches);
foreach ($matches[0] as $match) {
    list($a, $b) = explode(",", ltrim(rtrim($match, ")"), "mul("));
    $result += intval($a) * intval($b);
}

echo "$result\n";

