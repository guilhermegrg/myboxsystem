<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  email_templates

*/
class EmailMessageTemplate extends Model {
    
     /** TYPE: VARCHAR(50) NOT NULL
    VALIDATION: NOT_NULL, NOT_DUPLICATED, ONE_OR_MORE_NAMES
    */
    public $name;
    
    
     /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL
    */
    public $title;
    
    /** TYPE: TEXT NOT NULL
    VALIDATION: NOT_NULL
    */
    public $content;
    
    
}


?>