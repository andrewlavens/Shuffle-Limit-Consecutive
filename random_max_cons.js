export function random_max_cons(arr, max_cons)
{
    // Error must be triggered when (max_cons + 1) consecutive values are detected
    error_cons = max_cons + 1
    sufficiently_random = false
    while (sufficiently_random == false) {
        shuffleArray(arr)
        sufficiently_random = rmc(arr, error_cons)
    }
    return arr
}

function shuffleArray(array) {
    for (let i = array.length - 1; i >= 1; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function rmc(array, cons) {
    counter = 1
    idx = cons
    while (counter < cons) {
        if (array.length < cons) {
            return true
        }
        if (array[idx-counter] != array[idx-counter-1]) {
            return rmc(array.slice(idx-counter), cons)
        } else {
            counter+=1
        }
    }
    return false
}
