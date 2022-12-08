
<?php 
header('content-type:Application/json');
header('Acess-Control-Allow-Origin:*');
header('Acess-Control-Allow-Method:PUT');
header('Acess-Control-Allow-Headers:Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');
$data=json_decode(file_get_contents("php://input"),true);
include "dbcon.php";
$useremail = $data['Email'];
$pasword=$data['Password'];
$encryptpassword=md5($pasword);
//check if email exists in database
$checkemail="select Email from users where Email='$useremail'";

$result=mysqli_query($conn,$checkemail);
$row=mysqli_fetch_assoc($result);
if($useremail==$row['Email']){
   
$sql="Update users set Password='{$encryptpassword}' where Email='{$useremail}'";

$result=mysqli_query($conn,$sql);
// $data=("password has been changed:");
echo json_encode(array('message'=>' password changed sucessfully','status'=>false));
}

else{
    // $data=("password not changed:");
    echo json_encode(array('message'=>' password not set there is error','status'=>false));
}

?>
