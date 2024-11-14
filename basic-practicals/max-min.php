
    <?php
    $arr1=[12,10,45,30,56,89];
    $arr2=[23,40,90,53,93,1];
    
    $mrg=array_merge($arr1,$arr2);

    foreach($mrg as $m){
        echo $m . " , " ;
    }
    echo"<br><br>";
   $max=max($mrg);
   $min=min($mrg);

   echo "maximum number is : " . $max . "<br>";
   echo "minimum number is : " . $min . "<br>";
    ?>

