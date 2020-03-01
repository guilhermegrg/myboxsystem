<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  class_access_templates

*/
class ClassAccessTemplate extends Model {
    
     /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL, NOT_DUPLICATED, ONE_OR_MORE_NAMES
    */
    public $name;
    
    
}


?>