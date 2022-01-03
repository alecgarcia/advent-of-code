<?php

require_once __DIR__ . '/../../lib/php/utils.php';

$input = readInput(__DIR__);

// Task code
function part01(array $input)
{
    $temp = array();
    $binaryTemp = array();

    for ($j = 0; $j < count($input); $j++) {
        $split = str_split($input[$j], 1);

        for ($i = 0; $i < count($split); $i++) {
            if ($split[$i]) {
                $temp[$i] = ($temp[$i] ?? 0) + 1;
            } else {
                $temp[$i] = ($temp[$i] ?? 0) - 1;
            }
        }
    }

    for ($i = 0; $i < count($temp); $i++) {
        $binaryTemp[$i] = $temp[$i] < 0 ? 0 : 1;
    }

    $mostCommon = implode("", $binaryTemp);

    for ($i = 0; $i < count($binaryTemp); $i++) {
        $binaryTemp[$i] = $binaryTemp[$i] == 0 ? 1 : 0;
    }

    $lestCommon = implode("", $binaryTemp);
    $gamma = bindec($mostCommon);
    $epsilon = bindec($lestCommon);

    return $gamma * $epsilon;
}

function part02(array $input)
{

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
    [2250414, ], // Expected
    [$result01, $result02], // Result
);
