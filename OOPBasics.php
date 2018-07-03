<?php

class Remember{
    private $Oop;
    public function __construct(){
      echo "Kudos. I remember !!!";
    }
    //Methods/behaviour
    /*Returns $oop*/
    public function getoop(){
      return $this->Oop;
    }
    /*Sets new value for $oop*/
    public function setOop($param){
      $this->Oop = $param;
    }
  }
#object
$newObject = new Remember();
$event = 'Birthday';
//encapsulation here we do
//not know how the function works, we know what

?>
