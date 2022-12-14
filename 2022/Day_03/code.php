<?php

require_once __DIR__ . '/../../lib/php/utils.php';

$input = readInput(__DIR__);

// Task code
function part01(array $input)
{
    $sum = 0;

    foreach ($input as $rucksack) {
        $rucksack = str_split($rucksack, strlen($rucksack)/2);
        $compartment1 = str_split($rucksack[0]);
        $compartment2 = str_split($rucksack[1]);

        $type = array_intersect($compartment1, $compartment2);
        rsort($type);

        $sum += convertLetterToNumber($type[0]);
    }

    return $sum;
}

function part02(array $input)
{
    $sum = 0;
    $groups = [];
    $groupCount = 0;
    $count = 1;

    foreach ($input as $elf) {
        $groups[$groupCount][] = str_split($elf);

        if ($count == 3) {
            $groupCount++;
            $count = 1;
            continue;
        }

        $count++;
    }

    foreach ($groups as $group) {
       $badge = array_intersect($group[0], $group[1], $group[2]);
       rsort($badge);

       $sum += convertLetterToNumber($badge[0]);
    }

    return $sum;
}

function convertLetterToNumber($letter) {
    return (ord($letter) - (ctype_upper($letter) ? 38 : 96));
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
    [7850, 2581], // Expected
    [$result01, $result02], // Result
);
