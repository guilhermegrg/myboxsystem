<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  sms_templates

*/
class SMSTemplate extends Model {
    
     /** TYPE: VARCHAR(50) NOT NULL
    VALIDATION: NOT_NULL, NOT_DUPLICATED, ONE_OR_MORE_NAMES
    */
    public $name;
    
    
    /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL
    */
    public $content;
    
    
}


?>