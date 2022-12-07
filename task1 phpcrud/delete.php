<?php
$con=mysqli_connect("localhost","root","","sms");

    $student_id = $_GET['id']; 

    $sql = "DELETE from `students` WHERE `sid`='$student_id'";

    $result = $con->query($sql);
    echo "data deleted of id".$student_id; 
    header('location:http://localhost/phpcrud/index.php');
    ?>