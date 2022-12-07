<?php 
header('content-type:Application/json');
header('Acess-Control-Allow-Origin:*');
//include the databade connection file
include "dbconection.php";
//query to fetch all data from database with help of joins
$sql = "SELECT  sid, sname, scontact, scnic, cname, grades FROM students
INNER JOIN Courses ON students.cid = Courses.cid
INNER JOIN Grades ON students.gid = Grades.gid;";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output);
}else{
    echo json_encode(array('message'=>'no data found','status'=>false));
}
?>