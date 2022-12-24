<?php 

function sequentialSearch($data, $x) {
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == $x) {
            return $i;
        }
    }
    return -1;
}



$data = array(1, 2, 3, 4, 5);
$x = 10;
$index = sequentialSearch($data, $x);
if ($index == -1) {
    echo "$x not found in the array";
} else {
    echo "$x found at index $index";
}



// $data = array(1, 2, 3, 4, 5);
// $x = 8;
// $index = sequentialSearch($data, $x);
// if ($index == -1) {
//     echo "$x not found in the array";
// } else {
//     echo "$x found at index $index";
// }
