<?php 
header('content-type:Application/json');
header('Acess-Control-Allow-Origin:*');
$data=json_decode(file_get_contents("php://input"),true);
//include the databade connection file
include "dbcon.php";

   
$useremail = $data['Email'];
    
$userpassword = $data['Password'];
$encryptpassword=md5($userpassword);
$sql = "SELECT * from users where Email='$useremail' and Password ='$encryptpassword'";
//generate token
$token = "token";
$bytes = random_bytes(20);
$tokenValue = bin2hex($bytes);

$result = mysqli_query($conn, $sql) or die("Check Login Query Failed");

if (mysqli_num_rows($result) > 0) {
    //convert associative array for json format
    
    echo json_encode(array('message' => 'User login successful', 'status' => 'true'));
    
    setcookie($token, $tokenValue, time() + 120, "/");
    echo json_encode(array('token' => $token, 'tokenValue' => $tokenValue));
} else {
    echo json_encode(array('message' => 'invalid email/password', 'status' => 'false')); 
}



?>