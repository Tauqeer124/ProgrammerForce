<?php 
// $student_id = $_GET['id']; 
$con=mysqli_connect("localhost","root","","sms");
$sid = $_POST['sid'];
$studentname = $_POST['sname'];
    
$studentcontact = $_POST['scontact'];

$studentcnic= $_POST['scnic'];
$courseid = $_POST['cid'];
$gradeid = $_POST['gid'];
        $sql = "UPDATE `students` SET `sname`='$studentname',`scontact`='$studentcontact',`scnic`='$studentcnic',`cid`='$courseid',`gid`='$gradeid' WHERE `sid`='{$sid}'"; 

        $result = $con->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    
