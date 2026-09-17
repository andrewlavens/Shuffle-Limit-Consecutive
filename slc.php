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


function slc(Array $arr, Int $max_cons, Int|Null $offset = NULL, Int $length = 1): Array
{
    $passed = false;
    while (!$passed) {
        $collection = $arr;
        $n_values = count($collection);
        $result = [];
        $current_cons = 1;
        foreach(range(1, $n_values) as $idx) {
            $suitable_choice = false;
            while (!$suitable_choice) {
                $choice_idx = array_rand($collection);
                $choice = $collection[$choice_idx];
                if (count($result) > 0) {
                    if ($offset) {
                        $current = substr($choice, $offset, $length);
                        $previous = substr($result[count($result)-1], $offset, $length);
                    } else {
                        $current = $choice;
                        $previous = $result[count($result)-1];
                    }
                    if ($current_cons == $max_cons && count($result) > 0 && $current == $previous) {
                        $suitable_choice = false;
                        if ($offset) {
                            $substrings = [];
                            foreach($collection as $item) {
                                $substrings[] = substr($item, $offset, $length);
                            }
                            $keys = array_unique($substrings);
                            if (count($keys) == 1 && $keys[0] == substr($result[count($result)-1], $offset, $length)) {
                                break;
                            }
                        } else {
                            $keys = array_unique($collection);
                            if (count($keys) == 1 && $keys[0] == $result[count($result)-1]) {
                                break;
                            }
                        }
                    } else {
                        $suitable_choice = true;
                    }
                } else {
                    $suitable_choice = true;
                }
            }
            $result[] = $choice;
            array_splice($collection, $choice_idx, 1);
            if (count($result) > 1 && $current == $previous) {
                $current_cons++;
            } else {
                $current_cons = 1;
            }
        }
        if (count($collection) == 0) {
            $passed = true;
        }
    }
    return $result;
}

$arr = [1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,4,4,4,4,4,4,4,4,4,4];
print_r(implode(',', slc($arr, 1))."\n\n");
print_r(implode(',', slc($arr, 2))."\n\n");
print_r(implode(',', slc($arr, 3))."\n\n");
print_r(implode(',', slc($arr, 4))."\n\n");
print_r(implode(',', slc($arr, 5))."\n\n");
