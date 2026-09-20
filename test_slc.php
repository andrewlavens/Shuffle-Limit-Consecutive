<?php

require ('slc.php');
require ('items_to_shuffle.php');

// Timing many runs to retrieve an average
$trials = 1000;
foreach(range(1, 3) as $cons) {
    $results = [];
    $start = microtime(true);
    foreach (range(1, $trials) as $i) {
        $results[] = slc($digits, $cons);
    }
    echo "\n";
    $end = microtime(true);
    echo ((string)($trials) . ' iterations of slc using an array of length '. count($digits) .', ' . count(array_count_values($digits)).' different values,  maximum of ' . (string)($cons) . ' consecutive identical values: ' . (string) ($end-$start) . 's, average of ' . (string)((($end-$start)/$trials) * 1000) . "ms\n");
    echo 'One sample result: '.implode(',', $results[3])."\n\n";
}

$trials = 1000;
foreach(range(1, 3) as $cons) {
    $results = [];
    $start = microtime(true);
    foreach (range(1, $trials) as $i) {
        $results[] = slc($files, $cons, -5, 1);
    }
    echo "\n";
    $end = microtime(true);
    echo ((string)($trials) . ' iterations of shuffle_limit_consecutive_substring using an array of length '. count($files) .', maximum of ' . (string)($cons) . ' consecutive identical values: ' . (string) ($end-$start) . 's, average of ' . (string)((($end-$start)/$trials) * 1000) . "ms\n");
    echo "The file names are in the format <xxxxxxxx>_[abcd].wav and this function will check the substring _[abcd] for consecutive identical values.\n\n";
    echo 'One sample result: '.implode(',', $results[3])."\n\n";
}
