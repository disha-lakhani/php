<?php 
    $num=array(6,54,76,45,8,4,67,80,85,3,7,45,9);
    
    echo "--ascending order--";
    echo "<br><br>";
    sort($num);
    foreach ($num as $a){
        echo "$a <br>";
    }
    echo "<br><br>";
    echo "--decending order--";
    echo "<br><br>";
    rsort($num);
    foreach ($num as $a){
        echo "$a <br>";
    }

?>