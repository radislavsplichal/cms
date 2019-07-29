<?php 
namespace CMSCore;
session_start();
class Event extends CMSObject {
    
    public function saveEvent ($event_name,$event_desc,$event_start,$event_end,$event_price,$event_instructor){
    $type = 'LESSONS';
    
    //Lesson id is always 0, the field is AutoIncremented.
    $values = '0'."','".$event_name."','".$event_desc."','".$event_start."','".$event_end."','".$event_price."','".$event_instructor;
    $result = $this->saveObject($type,$values);
    //print_r($result['responseMessage']);
    
    return $result['responseMessage'];;
    }
    
}
?>