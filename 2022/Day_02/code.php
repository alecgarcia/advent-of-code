<?php

require_once __DIR__ . '/../../lib/php/utils.php';

$input = readInput(__DIR__);

// Task code
function part01(array $input)
{
    $score = 0;

    foreach ($input as $round) {
        $round = explode(' ', $round);
        $opponentChoice = $round[0];
        $myChoice = $round[1];

        $score += calculateRoundScore1($opponentChoice, $myChoice) + calculateChoiceScore1($myChoice);
    }

    return $score;
}

function part02(array $input)
{
    $score = 0;

    foreach ($input as $round) {
        $round = explode(' ', $round);
        $opponentChoice = $round[0];
        $needToEnd = $round[1];

        $myChoice = calculateChoice($opponentChoice, $needToEnd);

        $score += calculateRoundScore2($opponentChoice, $myChoice) + calculateChoiceScore2($myChoice);
    }

    return $score;
}

function calculateRoundScore1($opponentChoice, $myChoice) {
    switch ($opponentChoice) {
        case 'A':
            if ($myChoice == 'X') return 3;
            elseif ($myChoice == 'Y') return 6;
            else return 0;
        case 'B':
            if ($myChoice == 'X') return 0;
            elseif ($myChoice == 'Y') return 3;
            else return 6;
        case 'C':
            if ($myChoice == 'X') return 6;
            elseif ($myChoice == 'Y') return 0;
            else return 3;
    }
}

function calculateRoundScore2($opponentChoice, $myChoice) {
    switch ($opponentChoice) {
        case 'A':
            if ($myChoice == 'A') return 3;
            elseif ($myChoice == 'B') return 6;
            else return 0;
        case 'B':
            if ($myChoice == 'A') return 0;
            elseif ($myChoice == 'B') return 3;
            else return 6;
        case 'C':
            if ($myChoice == 'A') return 6;
            elseif ($myChoice == 'B') return 0;
            else return 3;
    }
}

function calculateChoiceScore1($myChoice) {
    return match($myChoice) {
        'X' => 1,
        'Y' => 2,
        'Z' => 3
    };
}

function calculateChoiceScore2($myChoice) {
    return match($myChoice) {
        'A' => 1,
        'B' => 2,
        'C' => 3
    };
}

function calculateChoice($opponentChoice, $needToEnd) {
    switch ($opponentChoice) {
        case 'A':
            if ($needToEnd == 'X') return 'C';
            elseif ($needToEnd == 'Y') return 'A';
            else return 'B';
        case 'B':
            if ($needToEnd == 'X') return 'A';
            elseif ($needToEnd == 'Y') return 'B';
            else return 'C';
        case 'C':
            if ($needToEnd == 'X') return 'B';
            elseif ($needToEnd == 'Y') return 'C';
            else return 'A';
    }
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
    [15691, 12989], // Expected
    [$result01, $result02], // Result
);
