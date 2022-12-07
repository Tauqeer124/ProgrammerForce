<?php 
header('content-type:Application/json');
header('Acess-Control-Allow-Origin:*');
header('Acess-Control-Allow-Method:POST');
header('Acess-Control-Allow-Headers:Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');
$data=json_decode(file_get_contents("php://input"),true);
include "dbconection.php";
$studentname = $data['sname'];
    
$studentcontact = $data['scontact'];

$studentcnic= $data['scnic'];
$courseid = $data['cid'];
$gradeid = $data['gid'];
//insert data in database
$sql="INSERT INTO students(sname,scontact,scnic,cid,gid) values('{$studentname}','{$studentcontact}','{$studentcnic}','{$courseid}','{$gradeid}')";
if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Record has been added','status'=>true));
}
else{
    echo json_encode(array('message'=>'no data added','status'=>false));
}
?>