# Shuffling arrays with limits on consecutive identical values

Shuffling an array, checking it has no more than *n* consecutive identical values (CIVs)

## Origins

This grew out of a regular requirement to take a collection of files and randomise them, limiting the number of a particular type that were presented consecutively.

### Values

In some cases the files and types were stored in a table, for example:

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

### Substrings

In this case the file types were derived from the names of the files, e.g.

- HjPTYr7x_**a**.wav
- nKGtrIpo_**a**.wav
- khtkKVfE_**a**.wav
- bik8vP4H_**b**.wav
- ii5zUs1r_**b**.wav
- 7SOc8tz3_**b**.wav
- ILo6BFPT_**b**.wav

Again, the order of the files didn't matter - only the limit on the order of types. In this example the type is inferred from the character before the ```.wav```, either ```a``` or ```b```.

## Operation

This function uses a deep copy of the supplied array and does not change the original.

- The function chooses a random value from the array.
  - If the result is empty, the value is appended to the empty array and removed from the original array.
  - The chosen value and final value in the array are compared (or their substrings are compared).
    - If the values are equal and the CIV limit has been reached, the function checks to see if the array contains just one value (or copies of the same value).
      - If this is true, the CIV limit will be broken. If this happens, the whole process starts from scratch.
      - If this isn't true, the function chooses a new value and begins the comparison again.
    - If the values aren't equal, the CIV count is reset.
    - If the values are equal, the CIV count is increased.
  - The chosen value is appended to the result and removed from the original array.
  - If the original array is empty, the shuffle must have been successful and the result must be fully populated and can be returned.
  - Otherwise, the function chooses a new value from the original array.

### ```result = shuffle_limit_civ(Array my_array, Int n, Int|Null offset = Null, Int length = 1) : Array```

- ```my_array``` (array) - the array to be shuffled
- ```n``` - (integer) the maximum number of CIVs permitted
- ```offset``` - (integer, default ```null```) the position in a string to start the comparison. Negative values count backwards from the end of the string
- ```length``` - (integer, default ```1```) the length of the substring that should be used for comparison

### Returns

- ```result``` (array) the shuffled and verified array

Given an array:

```txt
my_array = [1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4]
```

Calling the function ```shuffle_limit_civ(my_array, 2)``` should result in an array where no more than two consecutive elements are the same, for example:

```txt
[4, 2, 1, 1, 4, 3, 4, 1, 2, 2, 4, 3, 3, 1, 3, 2, 1, 3, 2, 4]
[1, 2, 2, 1, 3, 4, 2, 3, 1, 4, 4, 3, 3, 2, 1, 1, 4, 4, 3, 2]
```

Calling the function with an argument of ```1``` should return an array where every element is different from the one before:

```txt
[3, 4, 1, 3, 4, 2, 1, 3, 1, 3, 2, 1, 4, 2, 3, 1, 2, 4, 2, 4]
```

## Return values

- ```result``` (array) the shuffled and verified array

## Caveats

- The speed is 'good' but not very fast
  - Using Python and various combinations of array lengths and CIV targets the function averages between 0.04 and 0.35 milliseconds.
  - Using JavaScript and various combinations of array lengths and CIV targets the function averages between 0.01 and 0.05 milliseconds.
  - Using PHP and various combinations of array lengths and CIV targets the function averages between 0.03 and 0.04 milliseconds.
  - This should be quick enough for most needs but there will always be limits and edge cases.
