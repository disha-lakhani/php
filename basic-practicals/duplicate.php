<?php 

$a=array(2,3,4,5,3,2,4,);
echo "--old array---";
echo "<br><br>";
foreach ($a as $num){
    echo "$num ,";
}
$unique=array_unique($a);
echo "<br><br>";
echo "--new array---";
echo "<br><br>";

foreach($unique as $num){
    echo "$num ,";
}

?>