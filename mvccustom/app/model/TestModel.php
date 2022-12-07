<?php
namespace app\model;
class TestModel{
    private $server ="localhost";
    private $user ="root";
    private $password= "";
    private $database="ecomerce";
    
    private $conn = false;
    public function __construct(){
        
        if(!$this->conn){
            $this->conn = mysqli_connect($this->server, $this->user, $this->password, $this->database) or die();
            echo "Connection Successfully Created";
        }
        else {
            echo "Failed to connect ";
        }
    }
    public function select(){
        $sql="SELECT * FROM users";
       $result=mysqli_query($this->conn,$sql);
       $output=mysqli_fetch_assoc($result);
       return $output;
   }
    // public $arr=["ali","test","jkl"];
    // public function __construct(){
    //     return $this->arr;

    }

?>