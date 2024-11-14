<?php
    $people=[
        (object)['name'=>'john', 'age'=>23],
        (object)['name'=>'doe', 'age'=>30],
        (object)['name'=>'alice', 'age'=>20],
        (object)['name'=>'bob', 'age'=>28]
    ];

    $getname=function($person){
        return $person->name ;
    };
    $names=array_map($getname,$people);
    sort($names);

    echo "sorted names :<br>";
    foreach($names as $name){
        echo $name . "<br>";
    }
?>