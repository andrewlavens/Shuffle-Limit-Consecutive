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

def slc(arr, max_cons, offset = None, length = 1):
    passed = False
    while not passed:
        collection = arr.copy()
        substrings = []
        if offset:
            for item in collection:
                substrings.append(item[offset:offset+length])
        n_values = len(collection)
        result = []
        current_cons = 1
        for idx in range(n_values):
            suitable_choice = False
            while not suitable_choice:
                choice = random.choice(collection)
                if len(result) > 0:
                    if offset:
                        current = choice[offset:offset+length]
                        previous = result[-1][offset:offset+length]
                    else:
                        current = choice
                        previous = result[-1]
                    if current_cons == max_cons and current == previous:
                        suitable_choice = False
                        if offset:
                            keys = list(dict.fromkeys(substrings))
                            if len(keys) == 1 and keys[0] == result[-1][offset:offset+length]:
                                break
                        else:
                            keys = list(dict.fromkeys(collection))
                            if len(keys) == 1 and keys[0] == result[-1]:
                                break
                    else:
                        suitable_choice = True
                else:
                    suitable_choice = True
            result.append(choice)
            collection.pop(collection.index(choice))
            if len(substrings) > 0:
                substrings.pop(substrings.index(choice[offset:offset+length]))
            if len(result) > 1:
                if current == previous:
                    current_cons += 1
                else:
                    current_cons = 1
        if len(collection) == 0:
            passed = True
    return result        


'''
arr = [1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,4,4,4,4,4,4,4,4,4,4]
print ("Array: ", arr)
print ("One", slc(arr, 1))
print ("Two", slc(arr, 2))
print ("Three", slc(arr, 3))
print ("Four", slc(arr, 4))
print ("Five", slc(arr, 5))
'''
