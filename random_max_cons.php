<?php

/*
    rmc: check a sequence for too many consecutive values
    array: the array to test
    cons: the maximum number of consecutive values 
*/
function rmc_check(Array $array, Int $cons) : bool
{
    for ($idx = $cons-1; $idx < count($array) -1; $idx+=$cons) {
        if ($array[$idx] == $array[$idx + 1]) {
            return false;
        }
    }
    return true;
}

/*
    shuffle_limit_consecutive: shuffle an array such that there aren't n consecutive values that are equal
    array: the array to shuffle
    max_cons: the maximum number of consecutive values permitted
*/
function shuffle_limit_consecutive(Array $array, Int $max_cons): Array
{
    # Error must be triggered when (max_cons + 1) consecutive values are detected
    $error_cons = $max_cons + 1;
    $sufficiently_random = False;
    while ($sufficiently_random == False) {
        shuffle($array);
        $sufficiently_random = rmc_check($array, $max_cons);
    }
    return $array;
}

function check_length($array, $max_cons)
{
    if (count($array) > 50 && $max_cons < 3) {
        $types = array_count_values($array);
        foreach([2, 3, 5] as $divisor) {
            foreach($types as $type => $count) {
                if ($count % $divisor != 0) {
                    continue;
                }
            }
        }
    }
}


// Timing many runs to retrieve an average
$arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4];

$arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4];


$trials = 25;
foreach(range(1, 2) as $cons) {
    $results = [];
    $start = microtime(true);
    foreach (range(1, $trials) as $i) {
        $results[] = shuffle_limit_consecutive($arr, $cons);
        echo ".";
    }
    echo "\n";
    $end = microtime(true);
    print_r($results[3]);
    echo ((string)($trials) . ' iterations of shuffle_limit_consecutive with maximum of ' . (string)($cons) . ' consecutive values: ' . (string) ($end-$start) . 's, average of ' . (string)((($end-$start)/$trials) * 1000) . "ms\n\n");
}

$trials = 1000;
foreach(range(3, 10) as $cons) {
    $results = [];
    $start = microtime(true);
    foreach (range(1, $trials) as $i) {
        $results[] = shuffle_limit_consecutive($arr, $cons);
        echo ".";
    }
    echo "\n";
    $end = microtime(true);
    //print_r($results[999]);
    echo ((string)($trials) . ' iterations of shuffle_limit_consecutive with maximum of ' . (string)($cons) . ' consecutive values: ' . (string) ($end-$start) . 's, average of ' . (string)((($end-$start)/$trials) * 1000) . "ms\n\n");
}