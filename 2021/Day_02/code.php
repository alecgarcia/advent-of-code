<?php

require_once __DIR__ . '/../../lib/php/utils.php';

$input = readInput(__DIR__);

// Task code
function part01(array $input)
{
    $depth = 0;
    $horizontalPosition = 0;

    for ($i = 0; $i < count($input); $i++) {
        $step = explode(" ", $input[$i]);

        switch ($step[0]) {
            case stristr($step[0], "forward"):
                $horizontalPosition += $step[1];
                break;
            case stristr($step[0], "down"):
                $depth += $step[1];
                break;
            case stristr($step[0], "up"):
                $depth -= $step[1];
                break;
        }
    }

    return $depth * $horizontalPosition;
}

function part02(array $input)
{
    $aim = 0;
    $depth = 0;
    $horizontalPosition = 0;

    for ($i = 0; $i < count($input); $i++) {
        $step = explode(" ", $input[$i]);

        switch ($step[0]) {
            case stristr($step[0], "forward"):
                $depth += ($step[1] * $aim);
                $horizontalPosition += $step[1];
                break;
            case stristr($step[0], "down"):
                $aim += $step[1];
                break;
            case stristr($step[0], "up"):
                $aim -= $step[1];
                break;
        }
    }

    return $depth * $horizontalPosition;
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
    [1636725, 1872757425], // Expected
    [$result01, $result02], // Result
);
