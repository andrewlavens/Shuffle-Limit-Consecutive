function slc(arr, max_cons, offset=null, span=1) {
    passed = False;
    while (!passed) {
        collection = [...arr];
        length = collection.length;
        result = [];
        current_cons = 1;
        for (idx = 0; idx < length; idx++) {
            suitable_choice = false;
            while (!suitable_choice) {
                choice = collection[Math.floor(Math.random() * collection.length)]
                if (current_cons == max_cons && len(result) > 0 && choice == result[-1]) {
                    suitable_choice = False;
                    if (offset) {
                        substrings = collection.map(substrings.bind(null, offset, span));
                        keys = [...new Set(substrings)];
                    } else {
                        keys = [...new Set(collection)];
                    }
                    if (keys.size == 1 && keys[0] == result[-1]) {
                        break
                    }
                } else {
                    suitable_choice = True
                }
            }
            result.push(choice)
            collection.splice(collection.indexOf(choice), 1);
            if (result.length > 1) {
                if (offset) {
                    lastValue = result[result.length-1].slice(offset,span);
                    lastValue = result[result.length-2].slice(offset,span);
                } else {
                    lastValue = result[result.length-1];
                    lastValue = result[result.length-2];
                }
                if (lastValue == penultimateValue) {
                    current_cons += 1
                } else {
                    current_cons = 1
                }
            }
        }
        if (result.length === length) {
            passed = True
        }
    }
    return result        
}

function substring(entry, offset, length) {
    return entry.slice(offset, offset+length);
}

/*
arr = [1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,4,4,4,4,4,4,4,4,4,4]
print ("Array: ", arr)
print ("One", slc(arr, 1))
print ("Two", slc(arr, 2))
print ("Three", slc(arr, 3))
print ("Four", slc(arr, 4))
print ("Five", slc(arr, 5))
*/
