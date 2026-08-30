import random

'''
    rmc: check a sequence for too many consecutive values
    array: the array to test
    cons: the number of consecutive values that would trigger an error
'''
def rmc(array: list, cons: int) -> bool:
    counter = 1
    idx = cons
    while counter < cons:
        if len(array) < cons:
            return True
        if array[idx-counter] != array[idx-counter-1]:
            return rmc(array[(idx-counter):], cons)
        else:
            counter+=1
    return False

def rmc_check(array:list, cons:int) -> bool:
    cons -=1
    idx = cons-1
    while idx < len(array)-1:
        if array[idx] == array[idx+1]:
            return False
        idx += cons
    return True

'''
    shuffle_limit_consecutive: shuffle an array such that there aren't n consecutive values that are equal
    array: the array to shuffle
    max_cons: the maximum number of consecutive values permitted
'''
def shuffle_limit_consecutive(array: list, max_cons: int) -> list:
    # Error must be triggered when (max_cons + 1) consecutive values are detected
    error_cons = max_cons + 1
    sufficiently_random = False
    while sufficiently_random == False:
        random.shuffle(array)
        sufficiently_random = rmc(array, error_cons)
    return array
