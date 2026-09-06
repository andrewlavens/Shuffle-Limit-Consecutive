import time
from shuffle_limit_consecutive import shuffle_limit_consecutive, shuffle_limit_consecutive_substring

print ("==================")
print ("Testing substrings")
print ("==================")

files = ['mJMtBmVm_a.wav', 'w5F7vxv2_a.wav', 'J4xA83PM_a.wav', 'W5FirDqU_a.wav', '3JhrcsH0_a.wav', 'IOZSCvoe_a.wav', 'WswvP6RB_a.wav', 'HjPTYr7x_a.wav', 'nKGtrIpo_a.wav', 'khtkKVfE_a.wav', 'bik8vP4H_b.wav', 'ii5zUs1r_b.wav', '7SOc8tz3_b.wav', 'ILo6BFPT_b.wav', 'zV2xSQe7_b.wav', 'fMO8V2Gn_b.wav', 'LGnT6ULg_b.wav', '8dwmiDS3_b.wav', 'yKnPPeYd_b.wav', 'rZtlsWXJ_b.wav', 'byv29yuz_c.wav', '6YGDgHV4_c.wav', 'mBwE4DM2_c.wav', 'iat774oa_c.wav', '4bednRoi_c.wav', 'by0kPqQ7_c.wav', 'FF6k3oO4_c.wav', 'nQcrMH4s_c.wav', 'k1ClcgFb_c.wav', '2rwFBLDf_c.wav', 'jgrcD6rg_d.wav', 'O6QifgFE_d.wav', 'O714YOHF_d.wav', 'cE5lKCdJ_d.wav', 'UIDGKfSy_d.wav', '38fYDrLU_d.wav', '6h6ailDa_d.wav', 'kx2Ywxae_d.wav', 'a8gl9bcI_d.wav', 'l1kFI6HU_d.wav']
print ("Array: ", files)
trials = 100
for cons in range(1, 2):
    results = []
    start = time.monotonic()
    for i in range(trials):
        results.append(shuffle_limit_consecutive_substring(files,cons, -5, 1))
    end = time.monotonic()
    print(str(trials) + ' iterations of shuffle_limit_consecutive with maximum of ' + str(cons) + ' consecutive identical values: ' + str (end-start) + 's, average of ' + str(((end-start)/trials)*1000) + 'ms')
    print("One sample iteration: ", results[3])

print ("==============")

files = ['mJMtBmVm_a.wav', 'w5F7vxv2_a.wav', 'J4xA83PM_a.wav', 'W5FirDqU_a.wav', '3JhrcsH0_a.wav', 'IOZSCvoe_a.wav', 'WswvP6RB_a.wav', 'HjPTYr7x_a.wav', 'nKGtrIpo_a.wav', 'khtkKVfE_a.wav', 'bik8vP4H_b.wav', 'ii5zUs1r_b.wav', '7SOc8tz3_b.wav', 'ILo6BFPT_b.wav', 'zV2xSQe7_b.wav', 'fMO8V2Gn_b.wav', 'LGnT6ULg_b.wav', '8dwmiDS3_b.wav', 'yKnPPeYd_b.wav', 'rZtlsWXJ_b.wav', 'byv29yuz_c.wav', '6YGDgHV4_c.wav', 'mBwE4DM2_c.wav', 'iat774oa_c.wav', '4bednRoi_c.wav', 'by0kPqQ7_c.wav', 'FF6k3oO4_c.wav', 'nQcrMH4s_c.wav', 'k1ClcgFb_c.wav', '2rwFBLDf_c.wav', 'jgrcD6rg_d.wav', 'O6QifgFE_d.wav', 'O714YOHF_d.wav', 'cE5lKCdJ_d.wav', 'UIDGKfSy_d.wav', '38fYDrLU_d.wav', '6h6ailDa_d.wav', 'kx2Ywxae_d.wav', 'a8gl9bcI_d.wav', 'l1kFI6HU_d.wav']
print ("Array: ", files)
trials = 1000
for cons in range(2, 3):
    results = []
    start = time.monotonic()
    for i in range(trials):
        results.append(shuffle_limit_consecutive_substring(files,cons, -5, 1))
    end = time.monotonic()
    print(str(trials) + ' iterations of shuffle_limit_consecutive with maximum of ' + str(cons) + ' consecutive identical values: ' + str (end-start) + 's, average of ' + str(((end-start)/trials)*1000) + 'ms')
    print("One sample iteration: ", results[3])

print ("==============")

arr = [1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,4,4,4,4,4,4,4,4,4]
print ("Array: ", arr)
print ("Two", shuffle_limit_consecutive(arr, 2))
print ("Three", shuffle_limit_consecutive(arr, 3))
print ("Four", shuffle_limit_consecutive(arr, 4))
print ("Five", shuffle_limit_consecutive(arr, 5))

arr = ['s', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't']
print ("Array: ", arr)
print ("Two", shuffle_limit_consecutive(arr, 2))
print ("Three", shuffle_limit_consecutive(arr, 3))
print ("Four", shuffle_limit_consecutive(arr, 4))
print ("Five", shuffle_limit_consecutive(arr, 5))

# Timing many runs to retrieve an average
arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]
print ("Array: ", arr)
trials = 100
for cons in range(1, 3):
    results = []
    start = time.monotonic()
    for i in range(trials):
        results.append(shuffle_limit_consecutive(arr,cons))
    end = time.monotonic()
    print(str(trials) + ' iterations of shuffle_limit_consecutive with maximum of ' + str(cons) + ' consecutive identical values: ' + str (end-start) + 's, average of ' + str(((end-start)/trials)*1000) + 'ms')
    print("One sample iteration: ", results[3])

print ("==============")

trials = 1000
arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4]
print ("Array: ", arr)
for cons in range(3, 7):
    results = []
    start = time.monotonic()
    for i in range(trials):
        results.append(shuffle_limit_consecutive(arr,cons))
    end = time.monotonic()
    print(str(trials) + ' iterations of shuffle_limit_consecutive with maximum of ' + str(cons) + ' consecutive identical values: ' + str (end-start) + 's, average of ' + str(((end-start)/trials)*1000) + 'ms')
    print("One sample iteration: ", results[-20])
    print("------------------------------")

print ("==============")

trials = 100
arr = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2]
print ("Array: ", arr)
for cons in range(7, 11):
    results = []
    start = time.monotonic()
    for i in range(trials):
        results.append(shuffle_limit_consecutive(arr,cons))
    end = time.monotonic()
    print(str(trials) + ' iterations of shuffle_limit_consecutive with maximum of ' + str(cons) + ' consecutive identical values: ' + str (end-start) + 's, average of ' + str(((end-start)/trials)*1000) + 'ms')
    print("One sample iteration: ", results[-20])
    print("------------------------------")
