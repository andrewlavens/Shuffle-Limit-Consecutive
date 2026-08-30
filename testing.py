import time
from shuffle_limit_consecutive import shuffle_limit_consecutive

arr = [1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,4,4,4,4,4,4,4,4,4]

print ("Two", shuffle_limit_consecutive(arr, 2))
print ("Three", shuffle_limit_consecutive(arr, 3))
print ("Four", shuffle_limit_consecutive(arr, 4))
print ("Five", shuffle_limit_consecutive(arr, 5))

arr = ['s', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't']

#print ("Three", shuffle_limit_consecutive(arr, 3))
#print ("Four", shuffle_limit_consecutive(arr, 4))
#print ("Five", shuffle_limit_consecutive(arr, 5))

# Timing many runs to retrieve an average
arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4]

arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]

print (len(arr))

trials = 100
for cons in range(1, 8):
    results = []
    start = time.monotonic()
    for i in range(trials):
        results.append(shuffle_limit_consecutive(arr,cons))
    end = time.monotonic()
    print(results[3])
    print(str(trials) + ' iterations of shuffle_limit_consecutive with maximum of ' + str(cons) + ' consecutive values: ' + str (end-start) + 's, average of ' + str(((end-start)/trials)*1000) + 'ms')