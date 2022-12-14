<?php

require_once __DIR__ . '/../../lib/php/utils.php';

$input = readInput(__DIR__);

// Task code
function part01(array $input)
{
    $num = 0;

    foreach ($input as $pair) {
        $pair = explode(',', $pair);
        $elf1 = explode('-', $pair[0]);
        $elf2 = explode('-', $pair[1]);

        if (empty(array_diff(range($elf1[0], $elf1[1]), range($elf2[0], $elf2[1]))) || empty(array_diff(range($elf2[0], $elf2[1]), range($elf1[0], $elf1[1])))) {
            $num++;
        }
        //var_dump(range($elf1[0], $elf1[1]), range($elf2[0], $elf2[1]));
        //var_dump(empty(array_diff($elf2, $elf1)));
    }

    return $num;
}

function part02(array $input)
{
    $num = 0;

    foreach ($input as $pair) {
        $pair = explode(',', $pair);
        $elf1 = explode('-', $pair[0]);
        $elf2 = explode('-', $pair[1]);

        if (!empty(array_intersect(range($elf1[0], $elf1[1]), range($elf2[0], $elf2[1]))) || !empty(array_intersect(range($elf2[0], $elf2[1]), range($elf1[0], $elf1[1])))) {
            $num++;
        }
        //var_dump(range($elf1[0], $elf1[1]), range($elf2[0], $elf2[1]));
        //var_dump(empty(array_diff($elf2, $elf1)));
    }

    return $num;
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
    [588, 911], // Expected
    [$result01, $result02], // Result
);
