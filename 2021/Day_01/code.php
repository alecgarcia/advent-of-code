<?php

require_once __DIR__ . '/../../lib/php/utils.php';

$input = readInput(__DIR__);

// Task code
function part01(array $input)
{
    $previousDepth = null;
    $largerCount = 0;

    for ($i = 0; $i < count($input); $i++) {
        if ($previousDepth != null && $input[$i] > $previousDepth) {
            $largerCount++;
        }
        $previousDepth = $input[$i];
    }

    return $largerCount;
}

function part02(array $input)
{
    $previousSum = null;
    $largerCount = 0;

    for ($i = 0; $i+2 < count($input); $i++) {
        $currentSum = $input[$i] + $input[$i + 1] + $input[$i + 2];

        if ($previousSum != null && $previousSum < $currentSum) {
            $largerCount++;
        }

        $previousSum = $currentSum;
    }

    return $largerCount;
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
    [1766,1797], // Expected
    [$result01, $result02], // Result
);
