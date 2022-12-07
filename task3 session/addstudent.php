<?php 
include "dbcon.php";
session_start();
if($_SESSION['role'] =='normal user'||$_SESSION['role'] =='admin'){
    header("Location:http://localhost/phpsession/login.php");
}
$name = $_POST["name"];
$contact = $_POST["number"];
$cnic = $_POST["cnic"];
$course = $_POST["course"];
$grade = $_POST["grade"];
$sql="insert into students(sname, scontact, scnic, cid, gid)values('$name','$contact','$cnic','$course','$grade')";
// session_start();
if(mysqli_query($conn,$sql)){
    $_SESSION["success"] = "Record has been added !";
    header("Location:http://localhost/phpsession/indexpage.php");
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    $_SESSION["error"] = "Record does not added !";
    header("Location:http://localhost/phpsession/indexpage.php");
}

?>