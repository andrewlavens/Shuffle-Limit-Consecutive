import random

def slc(arr, max_cons):
    passed = False
    while not passed:
        collection = arr.copy()
        length = len(collection)
        result = []
        current_cons = 1
        for idx in range(length):
            suitable_choice = False
            while not suitable_choice:
                choice = random.choice(collection)
                if current_cons == max_cons and len(result) > 0 and choice == result[-1]:
                    suitable_choice = False
                    keys = list(dict.fromkeys(collection))
                    if len(keys) == 1 and keys[0] == result[-1]:
                        break
                else:
                    suitable_choice = True
            result.append(choice)
            collection.pop(collection.index(choice))
            if len(result) > 1:
                if result[-1] == result[-2]:
                    current_cons += 1
                else:
                    current_cons = 1
        if len(result) == length:
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
