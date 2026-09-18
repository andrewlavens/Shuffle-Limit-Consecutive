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
function slc(arr, max_cons, offset=null, span=1) {
    passed = false;
    while (!passed) {
        collection = [...arr];
        length = collection.length;
        result = [];
        current_cons = 1;
        for (idx = 0; idx < length; idx++) {
            abort = false;
            suitable_choice = false;
            while (!suitable_choice) {
                choice = collection[Math.floor(Math.random() * collection.length)]
                if (offset) {
                    lastValue = choice.toString().slice(offset, offset+span);
                    penultimateValue = result.slice(-1).toString().slice(offset, offset+span);
                } else {
                    lastValue = choice.toString();
                    penultimateValue = result.slice(-1).toString();
                }
                if (current_cons == max_cons && result.length > 0 && lastValue == penultimateValue) {
                    suitable_choice = false;
                    if (offset) {
                        substrings = collection.map((item) => {
                            return item.slice(offset, offset + span);
                        });
                        keys = [...new Set(substrings)];
                    } else {
                        keys = [...new Set(collection)];
                    }
                    if (keys.length == 1 && keys[0] == penultimateValue) {
                        abort = true;
                        break;
                    }
                } else {
                    suitable_choice = true
                }
            }
            if (abort) break;
            result.push(choice)
            collection.splice(collection.indexOf(choice), 1);
            if (result.length > 1) {
                if (lastValue == penultimateValue) {
                    current_cons += 1
                } else {
                    current_cons = 1
                }
            }
        }
        if (collection.length === 0) {
            passed = true
        }
    }
    return result        
}
