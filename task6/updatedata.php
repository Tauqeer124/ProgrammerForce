<?php 
//check if the cokie is set
// if (isset($_COOKIE['token'])) {
header('content-type:Application/json');
header('Acess-Control-Allow-Origin:*');
header('Acess-Control-Allow-Method:POST');
header('Acess-Control-Allow-Headers:Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');
// $data=json_decode(file_get_contents("php://input"),true);
include "dbcon.php";
$userid=$_POST['id'];
$username = $_POST['Name'];
    
$useremail = $_POST['Email'];

$userage= $_POST['Age'];
$usergender= $_POST['Gender'];

$userpassword= $_POST['Password'];
$encryptpassword=md5($userpassword);
if(is_uploaded_file($_FILES['Picture']['tmp_name']) && @$_POST['Name']) {
    $tmp_file=$_FILES['Picture']['tmp_name'];
    $imgname=$_FILES['Picture']['name'];
    $upload_dir="./pic/".$imgname;

//update data in database
$sql="Update users set Name='{$username}',Email='{$useremail}',Age='{$userage}',Gender='{$usergender}',Picture='{$imgname}',Password='{$encryptpassword}' where id='{$userid}'";
if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'your Acount  has been updated','status'=>true));
}
else{
    echo json_encode(array('message'=>' Record has been not updated','status'=>false));
}

}
?>