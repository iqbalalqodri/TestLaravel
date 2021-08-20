<?php


// // print_r($arr);

// // echo $arr[0][0];
// // echo $arr[0][1];
// // echo $arr[0][2];
// // echo $arr[0][3];

// // echo"<br>";

// // echo $arr[1][0];
// // echo $arr[1][1];
// // echo $arr[1][2];
// // echo $arr[1][3];

// PHP program to carry out multidimensional array search
  
function cari($arr,$input) {

    

    if($input =="fghi") {
        echo $arr[0][0];
        echo $arr[0][1];
        echo $arr[0][2];
        echo $arr[0][3];
    }elseif($input =="fghp"){
        echo $arr[0][0];
        echo $arr[0][1];
        echo $arr[0][2];
        echo $arr[1][2];
    }elseif($input =="fjrstp"){
        echo $arr[0][0];
        echo $arr[1][0];
        echo $arr[2][0];
        echo $arr[2][1];
        echo $arr[2][2];
        echo $arr[1][2];
    }

}

$arr = [
['f','g','h','i'],
['j','k','p','q'],
['r','s','t','u'],
];

echo cari($arr,"fjrstp");
  


?>