<?php 
header('content-type:Application/json');
header('Acess-Control-Allow-Origin:*');
header('Acess-Control-Allow-Method:PUT');
header('Acess-Control-Allow-Headers:Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');
$data=json_decode(file_get_contents("php://input"),true);
include "dbconection.php";
$student_id=$data['sid'];
$studentname = $data['sname'];
    
$studentcontact = $data['scontact'];

$studentcnic= $data['scnic'];
$courseid = $data['cid'];
$gradeid = $data['gid'];
//insert data in database
$sql="Update students set sname='{$studentname}',scontact='{$studentcontact}',scnic='{$studentcnic}',cid='{$courseid}',gid='{$gradeid}' where sid='{$student_id}'";
if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Record has been updated','status'=>true));
}
else{
    echo json_encode(array('message'=>' Record has been not updated','status'=>false));
}
?>