<?php

// 1

for ($i=1; $i <= 64 ; $i++) { 
    
     echo $i;
     if($i==1*8){
        echo " ";
        echo "<br>";
     }elseif($i==2*8){
        echo "<br>";
     }elseif($i==3*8){
        echo "<br>";
     }elseif($i==4*8){
        echo "<br>";
     }elseif($i==5*8){
        echo "<br>";
     }elseif($i==6*8){
        echo "<br>";
     }elseif($i==7*8){
        echo "<br>";
     }elseif($i==8*8){
        echo "<br>";
     }

}

echo "<br>";

// 2

function enkripsi($input)
{
    $key = array(        
        'D' => 'E',
        'F' => 'D',
        'H' => 'k',
        'K' => 'G',
        'N' => 'S',
        'Q' => 'K',
       );
       
       $output = str_replace(array_keys($key), $key, $input);
       echo "Hasil Enkripsi dari DFHKNQ : ".$output;   
}

$input=enkripsi("DFHKNQ");



?>
