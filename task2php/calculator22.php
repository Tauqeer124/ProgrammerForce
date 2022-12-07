<?php
class calculator{
    public $n1;
    public $n2;
    public $operator;
    public $result;
    public function __construct($n1,$n2,$operator){
        $this->n1=$n1;
        $this->n2=$n2;
        $this->operator=$operator;
    }
        public function calculate(){
            if($this->operator== '-')
            {
                return $this->result=$this->n1-$this->n2;
            }
            elseif($this->operator== '+')
            {
                return $this->result=$this->n1+$this->n2;
            }
            elseif($this->operator== '*')
            {
                return $this->result=$this->n1*$this->n2;
            }
            elseif($this->operator== '/')
            {
                return $this->result=$this->n1/$this->n2;
            }
            
            switch($this->operator){
                case '-':
        
                    return $this->result = $this->n1 - $this->n2;
                    break;
                case '+':
                    return $this->result =$this->n1 + $this->n2;
                    break;
                case '*':
                    return $this->result = $this->n1 * $this->n2;
                    break;
                case '/':
                    if($this->n2 ==0){
                        echo -1;}
                    else{
                        return $this->result =$this->n1 /$this->n2;}
                break;
                default:
                echo 0;
            }
        }
    public function show_result(){
        echo $this -> result;
    }
}
$res=new calculator(13,5,'*');
$res->calculate();
$res->show_result();

?>