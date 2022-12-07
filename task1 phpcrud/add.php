<?php
    $con = mysqli_connect("localhost","root","","sms");
    
    if ($con->connect_error) {

        die("Connection failed: " . $con->connect_error);
    
    }

    

        $studentname = $_POST['sname'];
    
        $studentcontact = $_POST['scontact'];
    
        $studentcnic= $_POST['scnic'];
        $courseid = $_POST['cid'];
        $gradeid = $_POST['gid'];
    
        
        $sql = "INSERT INTO `students`(`sname`, `scontact`, `scnic`,`cid`,`gid`) VALUES ('$studentname','$studentcontact','$studentcnic','$courseid','$gradeid')";
        // die('ddddddd');

        $result = $con->query($sql);
    
        if ($result == TRUE) {
    
          echo "New record created successfully.";
          header('location:http://localhost/phpcrud/index.php');
    
        }else{
    
          echo "Error:". $sql . "<br>". $con ->error;
    
        } 
    
        $con->close(); 
    
      


  
?>
