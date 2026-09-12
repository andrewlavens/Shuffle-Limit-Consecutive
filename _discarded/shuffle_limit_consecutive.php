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
    shuffle_limit_consecutive: shuffle an array such that there aren't n consecutive identical values that are equal
    array: the array to shuffle
    max_cons: the maximum number of consecutive identical values permitted
*/
function shuffle_limit_consecutive(Array $array, Int $max_cons): Array
{
    # Error must be triggered when (max_cons + 1) consecutive identical values are detected
    $sufficiently_random = False;
    while ($sufficiently_random == False) {
        shuffle($array);
        $sufficiently_random = slc_check_sparse($array, $max_cons);
    }
    return $array;
}

/*
    slc_check_sparse: check a sequence for too many consecutive identical values
    array: the array to test
    cons: the maximum number of consecutive identical values 
*/
function slc_check_sparse(Array $array, Int $max_cons) : bool
{
    $counter = 0;
    $idx = $max_cons;
    while ($counter < $max_cons) {
        if (count($array) <= $max_cons) {
            return true;
        }
        if ($array[$idx-$counter] != $array[$idx-$counter-1]) {
            return slc_check_sparse(array_slice($array, ($idx-$counter)), $max_cons);
        } else {
            $counter+=1;
        }
    }
    return false;
}

/*
    shuffle_limit_consecutive_substring: shuffle an array such that there aren't n consecutive identical values that are equal
    This function uses a substring of the values to check for CIVs
    array: the array to shuffle
    max_cons: the maximum number of consecutive identical values permitted
    offset: where in the value(s) to start the substring, false causes the whole value to be used and ignores length
    length: how much of each value to substring, false causes the remainder of the value to be used
*/
function shuffle_limit_consecutive_substring($array, $max_cons, $offset = null, $length = null): Array
{
    # Error must be triggered when (max_cons + 1) consecutive identical values are detected
    $sufficiently_random = False;
    while ($sufficiently_random == False) {
        shuffle($array);
        $sufficiently_random = slc_check_sparse_substring($array, $max_cons, $offset, $length);
    }
    return $array;
}

/*
    slc_check_sparse_substring: check a sequence for too many consecutive identical values
    This function uses a substring of the values to check for CIVs
    array: the array to test
    cons: the maximum number of consecutive identical values 
    offset: where in the value(s) to start the substring, false causes the whole value to be used and ignores length
    length: how much of each value to substring, false causes the remainder of the value to be used
*/
function slc_check_sparse_substring(array $array = [], int $max_cons = 1, ?int $offset = 0, ?int $length = null) : bool
{
    $counter = 0;
    $idx = $max_cons;
    while ($counter < $max_cons) {
        if (count($array) <= $max_cons) {
            return true;
        }
        $value = substr($array[$idx - $counter], $offset, $length);
        $comparator = substr($array[$idx-$counter - 1], $offset, $length);
        if ($value != $comparator) {
            return slc_check_sparse_substring(array_slice($array, ($idx-$counter)), $max_cons, $offset, $length);
        } else {
            $counter+=1;
        }
    }
    return false;
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


