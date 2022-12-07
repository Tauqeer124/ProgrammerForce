<?php
//index array
$car=array("toyota","43","bmw","ferari","cultus");
echo $car[0]."<br>";
echo $car[1]."<br>";
echo $car[2]."<br>";
echo $car[3]."<br>";
echo $car[4]."<br>";
print_r($car)."<br>";
//count function in array
$length=Count($car);
echo  "total length of array is".$length."<br>";
//for loop in index arrays
for($i=0;$i<$length;$i++){
    echo "value " .$car[$i]."<br>";
}
//Associative array
$age=array("ali"=>23,"waqas"=>29,"nabeel"=>"dkkk","ahad"=>43,);
//dump function in arrays
var_dump($age)."<br>";

//multidimensional array
$emp=[
    [1,"nabeel","manager",5000],
    [1,"zahid","ceo",3000],
    [1,"waqas","driver",7000],
];
//loop in multidimensional array
for($i=0;$i<3;$i++){
    for($j=0;$j<4;$j++){
        echo $emp[$i][$j]."<br>";
    }
}
//for each loop in multidimensional array
foreach($emp as $v1){
    foreach($v1 as $v2){
        echo $v2."";
    }
    echo "<br>";
}
//in_array function in array(is used to search a particular value in the array)
$teacher=["ali","waqas","ahad",32];
 echo in_array("aili",$teacher);
if (in_array("ali",$teacher)){
    echo "record has been found";
}
else{
    echo "record not found";
}

$hello=["ali","waqas","nawas","ahmad"];
shuffle($hello);
print_r($hello);
//explode function in array
$a="hello how. are you";
$res=explode(" ",$a);
print_r($res);
//implode function in array
$a=["hello","how","are","you","in","php",];
$res=implode("",$a);
print_r($res);





?>