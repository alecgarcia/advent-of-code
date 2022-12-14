<?php

require_once __DIR__ . '/../../lib/php/utils.php';

$input = readInput(__DIR__);

// Task code
function part01(array $input)
{
    $calories = [];
    $count = 0;

    foreach ($input as $elf ) {
        if ($elf === '') {
            $count++;
            continue;
        }

        isset($calories[$count]) ? : $calories[$count] = 0;

        $calories[$count] += $elf;
    }

    return max($calories);
}

function part02(array $input)
{
    $calories = [];
    $count = 0;

    foreach ($input as $elf ) {
        if ($elf === '') {
            $count++;
            rsort($calories);
            continue;
        }

        isset($calories[$count]) ? : $calories[$count] = 0;

        $calories[$count] += $elf;
    }

    return $calories[0] + $calories[1] + $calories[2];
}

// Execute
calcExecutionTime();
$result01 = part01($input);
$result02 = part02($input);
$executionTime = calcExecutionTime();

writeln('Solution Part 1: ' . $result01);
writeln('Solution Part 2: ' . $result02);
writeln('Execution time: ' . $executionTime);

saveBenchmarkTime($executionTime, __DIR__);

// Task test
testResults(
    [70698, 206643], // Expected
    [$result01, $result02], // Result
);
