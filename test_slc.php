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

$files = ['mJMtBmVm_a.wav', 'w5F7vxv2_a.wav', 'J4xA83PM_a.wav', 'W5FirDqU_a.wav', '3JhrcsH0_a.wav', 'IOZSCvoe_a.wav', 'WswvP6RB_a.wav', 'HjPTYr7x_a.wav', 'nKGtrIpo_a.wav', 'khtkKVfE_a.wav', 'bik8vP4H_b.wav', 'ii5zUs1r_b.wav', '7SOc8tz3_b.wav', 'ILo6BFPT_b.wav', 'zV2xSQe7_b.wav', 'fMO8V2Gn_b.wav', 'LGnT6ULg_b.wav', '8dwmiDS3_b.wav', 'yKnPPeYd_b.wav', 'rZtlsWXJ_b.wav', 'byv29yuz_c.wav', '6YGDgHV4_c.wav', 'mBwE4DM2_c.wav', 'iat774oa_c.wav', '4bednRoi_c.wav', 'by0kPqQ7_c.wav', 'FF6k3oO4_c.wav', 'nQcrMH4s_c.wav', 'k1ClcgFb_c.wav', '2rwFBLDf_c.wav', 'jgrcD6rg_d.wav', 'O6QifgFE_d.wav', 'O714YOHF_d.wav', 'cE5lKCdJ_d.wav', 'UIDGKfSy_d.wav', '38fYDrLU_d.wav', '6h6ailDa_d.wav', 'kx2Ywxae_d.wav', 'a8gl9bcI_d.wav', 'l1kFI6HU_d.wav'];
$trials = 100;
foreach(range(1, 2) as $cons) {
    $results = [];
    $start = microtime(true);
    foreach (range(1, $trials) as $i) {
        $results[] = slc($files, $cons, -5, 1);
        echo ".";
    }
    echo "\n";
    $end = microtime(true);
    echo ((string)($trials) . ' iterations of shuffle_limit_consecutive_substring using an array of length '. count($files) .', maximum of ' . (string)($cons) . ' consecutive identical values: ' . (string) ($end-$start) . 's, average of ' . (string)((($end-$start)/$trials) * 1000) . "ms\n");
    echo "The file names are in the format <xxxxxxxx>_[abcd].wav and this function will check the substring _[abcd] for consecutive identical values.\n\n";
    echo 'One sample result: '.implode(',', $results[3])."\n\n";
}
