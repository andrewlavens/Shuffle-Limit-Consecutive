<?php
/*
Copyright (C) 2026 Andrew Lavens

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://gnu.org>.
*/
/*
    slc: check a sequence for too many consecutive values
    array: the array to test
    cons: the maximum number of consecutive values 
*/
function slc_check(Array $array, Int $cons) : bool
{
    for ($idx = $cons-1; $idx < count($array) -1; $idx+=$cons) {
        if ($array[$idx] == $array[$idx + 1]) {
            return false;
        }
    }
    return true;
}

function slc_check_sparse($array, $cons) : bool
{
    //$error_cons = $cons + 1;
    $error_cons = $cons;
    $counter = 1;
    $idx = $error_cons;
    while ($counter < $error_cons) {
        if (count($array) < $error_cons) {
            return true;
        }
        if ($array[$idx-$counter] != $array[$idx-$counter-1]) {
            return slc_check_sparse(array_slice($array, ($idx-$counter)), $error_cons);
        } else {
            $counter+=1;
        }
    }
    return false;
}

/*
    shuffle_limit_consecutive: shuffle an array such that there aren't n consecutive values that are equal
    array: the array to shuffle
    max_cons: the maximum number of consecutive values permitted
*/
function shuffle_limit_consecutive(Array $array, Int $max_cons): Array
{
    # Error must be triggered when (max_cons + 1) consecutive values are detected
    $sufficiently_random = False;
    while ($sufficiently_random == False) {
        shuffle($array);
        $sufficiently_random = slc_check_sparse($array, $max_cons);
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


