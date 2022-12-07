<?php
include "dbcon.php";

session_start();

// NOT EXECUTE SCRIPT FOR THESE ROLES
if ($_SESSION['role'] == 'normal' || $_SESSION['role'] == 'admin') {
    header("Location:http://localhost/phpsession/login.php");
}

$cid = $_GET['cid'];

$sql = "DELETE FROM courses WHERE cid=$cid";

if (mysqli_query($conn, $sql)) {
    $_SESSION["success"] = "Course Delete Successfully !";
    header("Location:http://localhost/phpsession/indexpage.php");
} else {
    $_SESSION["error"] = "Course Not Delete Successfully !";
    header("Location:http://localhost/phpsession/indexpage.php");
}
