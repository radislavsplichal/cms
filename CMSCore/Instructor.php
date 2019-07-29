<?php
namespace CMSCore;
class Instructor extends CMSObject {
    
     public $name = "";
     public $surname = "";
     public $bio = "";
     
     function __construct()
     {
         $a = func_get_args();
         $i = func_num_args();
         if (method_exists($this,$f='__construct'.$i)) {
             call_user_func_array(array($this,$f),$a);
         }
     } 
     
     function __construct1() {
         
     }
     
     function __construct2($a1,$a2,$a3) {
         $this->name = $a1;
         $this->surname = $a2;
         $this->bio = $a3;
     }
     
     public function saveInstructor(){
     
     $type = "INSTRUCTORS";
     
     $values = '0'."','".$this->name."','".$this->surname."','".$this->bio;

     $result = $this->saveObject($type,$values);
     
     return $result;
    }
}
?>