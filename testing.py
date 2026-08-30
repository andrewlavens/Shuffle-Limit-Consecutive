import time
from random_max_cons import random_max_cons

arr = [1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,4,4,4,4,4,4,4,4,4]

print ("Two", random_max_cons(arr, 2))
print ("Three", random_max_cons(arr, 3))
print ("Four", random_max_cons(arr, 4))
print ("Five", random_max_cons(arr, 5))

arr = ['s', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't']

print ("Three", random_max_cons(arr, 3))
print ("Four", random_max_cons(arr, 4))
print ("Five", random_max_cons(arr, 5))

# Timing many runs to retrieve an average
arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4]

arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]

trials = 100
for cons in range(1, 8):
    results = []
    start = time.monotonic()
    for i in range(trials):
        results.append(random_max_cons(arr,cons))
    end = time.monotonic()
    print(results[3])
    print(str(trials) + ' iterations of random_max_cons with maximum of ' + str(cons) + ' consecutive values: ' + str (end-start) + 's, average of ' + str(((end-start)/trials)*1000) + 'ms')