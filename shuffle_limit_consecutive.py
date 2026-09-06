'''
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
'''
import random
'''
    slc_check: check a sequence for too many consecutive identical values
    array: the array to test
    cons: the maximum number of consecutive identical values permitted
    This function attempts to run sparse checking of an array, looking for too many consecutive identical values (CIVs). It starts at the nth value (where n is the CIV limit) and compares it to the (nth -1) value. If the array elements are different, advance the array pointer another n values and reset the CIV limit counter. If they are the same, keep working backwards until either a different element is found or the CIV limit is reached.
    If the CIV limit is reached, the function immediately returns false. If the end of the array is reached, the function returns true.
'''
def slc_check(array: list, cons: int) -> bool:
    counter = 0
    idx = cons
    while counter < cons:
        if len(array) <= cons:
            return True
        if array[idx-counter] != array[idx-counter-1]:
            return slc_check(array[(idx-counter):], cons)
        else:
            counter+=1
    return False

'''
    shuffle_limit_consecutive: shuffle an array such that there aren't n consecutive identical values that are equal
    array: the array to shuffle
    max_cons: the maximum number of consecutive identical values permitted
'''
def shuffle_limit_consecutive(array: list, max_cons: int) -> list:
    sufficiently_random = False
    while sufficiently_random == False:
        random.shuffle(array)
        sufficiently_random = slc_check(array, max_cons)
    return array

'''
    slc_check_substring: check a sequence for too many consecutive identical values
    array: the array to test
    cons: the maximum number of consecutive identical values permitted
    This function attempts to run sparse checking of an array, looking for too many consecutive identical values (CIVs). It starts at the nth value (where n is the CIV limit) and compares it to the (nth -1) value. If the array elements are different, advance the array pointer another n values and reset the CIV limit counter. If they are the same, keep working backwards until either a different element is found or the CIV limit is reached.
    If the CIV limit is reached, the function immediately returns false. If the end of the array is reached, the function returns true.
'''
def slc_check_substring(array: list, cons: int, offset: int = 0, length: int = None) -> bool:
    counter = 0
    idx = cons
    while counter < cons:
        if len(array) <= cons:
            return True
        value = array[idx-counter][offset:(offset+length)]
        comparator = array[idx-counter-1][offset:(offset+length)]
        if value != comparator:
            return slc_check_substring(array[(idx-counter):], cons, offset, length)
        else:
            counter+=1
    return False

'''
    shuffle_limit_consecutive_substring: shuffle an array such that there aren't n consecutive identical values that are equal
    array: the array to shuffle
    max_cons: the maximum number of consecutive identical values permitted
'''
def shuffle_limit_consecutive_substring(array: list, max_cons: int, offset: int = 0, length: int = None) -> list:
    sufficiently_random = False
    while sufficiently_random == False:
        random.shuffle(array)
        sufficiently_random = slc_check_substring(array, max_cons, offset, length)
    return array
