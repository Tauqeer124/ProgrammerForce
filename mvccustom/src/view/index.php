<?php
require_once "../../vendor/autoload.php";
use App\controller\TestController;
$objres=new TestController();
$result=$objres->all();
// $output=mysqli_fetch_assoc($result);
print_r($result);
?>