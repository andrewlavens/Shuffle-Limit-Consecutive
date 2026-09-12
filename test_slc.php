<?php

require ("slc.php");

// Timing many runs to retrieve an average
$arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5];
$trials = 1000;
foreach(range(1, 2) as $cons) {
    $results = [];
    $start = microtime(true);
    foreach (range(1, $trials) as $i) {
        $results[] = slc($arr, $cons);
        echo ".";
    }
    echo "\n";
    $end = microtime(true);
    echo ((string)($trials) . ' iterations of slc using an array of length '. count($arr) .', ' . count(array_count_values($arr)).' different values,  maximum of ' . (string)($cons) . ' consecutive identical values: ' . (string) ($end-$start) . 's, average of ' . (string)((($end-$start)/$trials) * 1000) . "ms\n");
    echo 'One sample result: '.implode(',', $results[3])."\n\n";
}

$arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4];
$trials = 1000;
foreach(range(3, 6) as $cons) {
    $results = [];
    $start = microtime(true);
    foreach (range(1, $trials) as $i) {
        $results[] = slc($arr, $cons);
        echo ".";
    }
    echo "\n";
    $end = microtime(true);
    echo ((string)($trials) . ' iterations of slc using an array of length '. count($arr) .', ' . count(array_count_values($arr)).' different values,  maximum of ' . (string)($cons) . ' consecutive identical values: ' . (string) ($end-$start) . 's, average of ' . (string)((($end-$start)/$trials) * 1000) . "ms\n");
    echo 'One sample result: '.implode(',', $results[3])."\n\n";
}

$arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2];
$trials = 1000;
foreach(range(10, 12) as $cons) {
    $results = [];
    $start = microtime(true);
    foreach (range(1, $trials) as $i) {
        $results[] = slc($arr, $cons);
        echo ".";
    }
    echo "\n";
    $end = microtime(true);
    echo ((string)($trials) . ' iterations of slc using an array of length '. count($arr) .', ' . count(array_count_values($arr)).' different values,  maximum of ' . (string)($cons) . ' consecutive identical values: ' . (string) ($end-$start) . 's, average of ' . (string)((($end-$start)/$trials) * 1000) . "ms\n");
    echo 'One sample result: '.implode(',', $results[3])."\n\n";
}
