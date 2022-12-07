<?php
//multidimensional array
$employee=[
    0=>["0"=>"ali","1"=>"manager","2"=>5000],
    1=>["0"=>"waqas","1"=>"general manager","2"=>9000],
    2=>["0"=>"ahad","1"=>"ceo","2"=>10000],
    3=>["0"=>"nabel","1"=>"clerk","2"=>2000]
];
echo "<h1>print multidimensional without loop</h1><br>";
echo "<pre>";
print_r($employee);
echo "<pre>";

// echo "<h1>sort multidimensional array</h1><br>";

// array_multisort($employee);
// print_r($employee);


//count function
//echo count($employee);
//push function in multidimensional array
array_push($employee, ["0"=>"shahbaz","1"=>"programer","2"=>200000]);

// echo "<h3>insert data on multidimensional array at indexx 2</h3><br>";
array_push($employee[2], "dkdfkjfkjfkfj");
//pop function
  //xarray_pop($employee);
//foreach loop
//shift function
//array_shift($employee);
//unshift
//array_unshift($employee,["0"=>"ushift","1"=>"programer","2"=>200000]);

echo "<h1>print multidimensional array with help of foreach loop</h1><br>";
foreach ($employee as $key => $v1){
    
    print_r($key);
    echo "<br>";
    foreach($v1 as  $key=>$v2){
        print_r($v2);
        echo "<br>";
    }
}


//merge array example

$teacher=[
    0=>["0"=>"ali","1"=>"manager","2"=>5000],
    1=>["0"=>"waqas","1"=>"general manager","2"=>9000],
    2=>["0"=>"ahad","1"=>"ceo","2"=>10000],
    3=>["0"=>"nabel","1"=>"clerk","2"=>2000]
];
$student=[
    0=>["0"=>"student1","1"=>"manager","2"=>5000],
    1=>["0"=>"student2","1"=>"general manager","2"=>9000],
    2=>["0"=>"student3","1"=>"ceo","2"=>10000],
    
];
$newarray=array_merge_recursive($teacher,$student);
echo "<h1>merge arraay example</h1><br>";
print_r ($newarray);

?>
