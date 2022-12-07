<?php
namespace App\controller;
use App\model\TestModel;
class TestController {
    public $obj;
    public function __construct(){
        $this->obj=new TestModel();
        
        

    }
    public function all(){
        $output=$this->obj->select();
        //   $result=mysqli_fetch_assoc($output);
          return $output;
            
}
}
?>