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

export function shuffle_limit_consecutive(arr, max_cons)
{
    sufficiently_random = false
    while (sufficiently_random == false) {
        shuffleArray(arr)
        sufficiently_random = slc(arr, max_cons)
    }
    return arr
}

function shuffleArray(array) {
    for (let i = array.length - 1; i >= 1; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function slc(array, cons) {
    counter = 0
    idx = cons
    while (counter < cons) {
        if (array.length <= cons) {
            return true
        }
        if (array[idx-counter] != array[idx-counter-1]) {
            return slc(array.slice(idx-counter), cons)
        } else {
            counter+=1
        }
    }
    return false
}

export function shuffle_limit_consecutive_subset(arr, max_cons, offset, length)
{
    sufficiently_random = false
    while (sufficiently_random == false) {
        shuffleArray(arr)
        sufficiently_random = slc_subset(arr, max_cons, offset, length)
    }
    return arr
}

function slc_subset(array, cons, offset, length) {
    counter = 0
    idx = cons
    while (counter < cons) {
        if (array.length <= cons) {
            return true
        }
        if (offset < 0) {
            value = array[idx-counter].substring(array[idx-counter].length + offset,(array[idx-counter].length + offset + length))
            comparator = array[idx-counter-1].substring(array[idx-counter-1].length + offset,(array[idx-counter-1].length + offset + length))
        } else {
            value = array[idx-counter].substring(offset,(offset+length))
            comparator = array[idx-counter-1].substring(offset,(offset+length))
        }
        if (value != comparator) {
            return slc_subset(array.slice(idx-counter), cons, offset, length)
        } else {
            counter+=1
        }
    }
    return false
}
