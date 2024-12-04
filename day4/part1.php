<?php

$filename = "./input.txt";
$lines = file($filename);
$result = 0;
$grid = [];

foreach ($lines as $line) {
    $grid[] = str_split(trim($line));
}

function check_pos(int $x, int $y): int
{
    global $grid;
    if ($grid[$y][$x] !== 'X') {
        return 0;
    }

    $num_found = 0;
    for ($y_delta = -1; $y_delta <= 1; $y_delta++) {
        for ($x_delta = -1; $x_delta <= 1; $x_delta++) {
            if (cast_ray($x + $x_delta, $y + $y_delta, $x_delta, $y_delta, 'M')) {
                $num_found += 1;
            }
        }
    }

    return $num_found;
}

function cast_ray(int $x, int $y, int $x_delta, int $y_delta, string $target): bool
{
    global $grid;

    if ($x < 0 || $x >= count($grid[0]) || $y < 0 || $y >= count($grid)) {
        return false;
    }
    $current_target_matches = $grid[$y][$x] === $target;

    if ($target === 'S') {
        return $current_target_matches;
    }

    $next_target = match($target) {
        'M' => 'A',
        'A' => 'S',
    };

    return $current_target_matches && cast_ray($x + $x_delta, $y + $y_delta, $x_delta, $y_delta, $next_target);
}

for ($y = 0; $y < count($grid); $y++) {
    for ($x = 0; $x < count($grid[0]); $x++) {
        $result += check_pos($x, $y);
    }
}

echo "$result\n";

