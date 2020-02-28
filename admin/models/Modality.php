<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  modalities

*/
class Modality extends Model {
    
     /** TYPE: VARCHAR(50) NOT NULL
    VALIDATION: NOT_NULL, NOT_DUPLICATED, SINGLE_NAME
    */
    public $name;
    
    
    /** TYPE: boolean NOT NULL default true
    */
    public $active = true;
    
    
}


?>