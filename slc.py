import random

def slc(arr, max_cons, offset = None, length = 1):
    passed = False
    while not passed:
        collection = arr.copy()
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
                            substrings = []
                            for item in collection:
                                substrings.append(item[offset:offset+length])
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
            if len(result) > 1:
                '''if offset:
                    current = result[-1][offset:offset+length]
                    previous = result[-2][offset:offset+length]
                else:
                    current = result[-1]
                    previous = result[-2]'''
                #print(current, previous)
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
