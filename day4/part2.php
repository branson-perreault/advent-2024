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
    if ($grid[$y][$x] !== 'A') {
        return 0;
    }

    for ($rotation = 0; $rotation < 4; $rotation++) {
        $matches = 0;
        for ($y_delta = -1; $y_delta <= 1; $y_delta += 2) {
            for ($x_delta = -1; $x_delta <= 1; $x_delta += 2) {

                $axis = $rotation < 2 ? $y_delta : $x_delta;
                $amplitude = $rotation % 2 === 0 ? 1 : -1;
                $target = $axis === $amplitude ? 'M' : 'S';

                if ($x + $x_delta < 0 || $x + $x_delta >= count($grid[0]) || $y + $y_delta < 0 || $y + $y_delta >= count($grid)) {
                    continue;
                }
                if ($grid[$y + $y_delta][$x + $x_delta] === $target) {
                    $matches++;
                }
            }
        }
        if ($matches === 4) {
            return 1;
        }
    }

    return 0;
}

for ($y = 0; $y < count($grid); $y++) {
    for ($x = 0; $x < count($grid[0]); $x++) {
        $result += check_pos($x, $y);
    }
}

echo "$result\n";

