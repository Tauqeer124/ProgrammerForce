<?php 
header('content-type:Application/json');
header('Acess-Control-Allow-Origin:*');
header('Acess-Control-Allow-Method:Delete');
header('Acess-Control-Allow-Headers:Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');
$data=json_decode(file_get_contents("php://input"),true);
include "dbconection.php";
$student_id=$data['sid'];
$sql="Delete from students where sid={$student_id}";

if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Record has been deleted','status'=>true));
}
else{
    echo json_encode(array('message'=>'record not delted error','status'=>false));
} 