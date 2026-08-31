# Shuffle-Limit-Consecutive

Shuffling an array, checking it has no more than n consecutive identical values (CIVs)

## Origins

This grew out of a regular requirement to take a collection of files and randomise them, limiting the number of a particular type that were presented consecutively. The files and types were stored in a table, for example:

| File | Type |
| --- | --- |
| file_1.file | a |
| file_2.file | a |
| file_3.file | a |
| file_4.file | b |
| file_5.file | b |
| file_6.file | b |
| file_7.file | b |

The order of the files didn't matter - only the limit on the order of types. So the types from the table above could be retrieved as ```[a, a, a, b, b, b, b]``` and, once shuffled, the first element (let's say ```b```) could refer to *any* file of type *b*.

These functions take an array, shuffle it, then check that there are no more than *n* CIVs.

## Operation

### ```result = shuffle_limit_consecutive(my_array, n)```

- ```my_array``` (array) - the array to be shuffled
- ```n``` - (integer) the maximum number of CIVs permitted

### Returns

- ```result``` (array) the shuffled and verified array

Given an array:

```txt
my_array = [1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4]
```

Calling the function ```shuffle_limit_consecutive(my_array, 2)``` should result in an array where no more than two consecutive elements are the same, for example:

```txt
[4, 2, 1, 1, 4, 3, 4, 1, 2, 2, 4, 3, 3, 1, 3, 2, 1, 3, 2, 4]
[1, 2, 2, 1, 3, 4, 2, 3, 1, 4, 4, 3, 3, 2, 1, 1, 4, 4, 3, 2]
```

Calling the function with an argument of ```1``` should return an array where no element is different from the one before:

```txt
[3, 4, 1, 3, 4, 2, 1, 3, 1, 3, 2, 1, 4, 2, 3, 1, 2, 4, 2, 4]
```

## Caveats

- This isn't a 'solver'
  - This function won't attempt to find a single solution. It will simply shuffle the array then check for consecutive identical elements. If you are looking for a 'solution' where shuffling an array in the 'right' way produces a 'correct' answer then this probable isn't for you.
- This isn't fast!
  - Using Python the function is rapid when checking for 3+ consecutive elements in an array of ~100 elements. Larger arrays will take longer to check, especially larger arrays containing less variety (e.g. an array of 200 elements that are either '1' or '2')
  - Checking for a limit of 1 or 2 identical consecutive elements in arrays with 20+ elements will take time. Running the function with an array of 50 elements and a consecutive limit of 1 took an average of 145ms (running the function 100 times).
