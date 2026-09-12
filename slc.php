<?php
function slc(Array $arr, Int $max_cons): Array
{
    $passed = false;
    while (!$passed) {
        $collection = $arr;
        $length = count($collection);
        $result = [];
        $current_cons = 1;
        foreach(range(1, $length) as $idx) {
            $suitable_choice = false;
            while (!$suitable_choice) {
                $choice_idx = array_rand($collection);
                $choice = $collection[$choice_idx];
                if ($current_cons == $max_cons && count($result) > 0 && $choice == $result[count($result)-1]) {
                    $suitable_choice = false;
                    $keys = array_unique($collection);
                    if (count($keys) == 1 && $keys[0] == $result[count($result)-1]) {
                        break;
                    }
                } else {
                    $suitable_choice = true;
                }
            }
            $result[] = $choice;
            array_splice($collection, $choice_idx, 1);
            if (count($result) > 1 && $result[count($result)-1] == $result[count($result)-2]) {
                $current_cons++;
            } else {
                $current_cons = 1;
            }
        }
        if (count($result) == $length) {
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
