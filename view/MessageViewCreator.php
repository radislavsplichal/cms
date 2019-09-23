<?php

class MessageViewCreator
{
    
    /* This class creates an appropriet alert message based on the Bootstrap framework.
     * <div class="alert alert-success" role="alert">...</div>
        <div class="alert alert-info" role="alert">...</div>
        <div class="alert alert-warning" role="alert">...</div>
        <div class="alert alert-danger" role="alert">...</div>
     * 
     */
private $message;
    public function __construct($messageText,$messageType)
    {
        $this->message = $messageText;
        $this->message = $messageType;
    }
    
    public static function createMessage ($messageText, $messageType) {
        $start= '<div class="alert alert-';
        //$messageType
        $mid= '" role="alert">';
        //$message
        $end= '</div';
        
       return $concatenadedString = $start . $messageType . $mid . $messageText . $end;
       
    }
}


