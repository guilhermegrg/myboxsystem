<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  periodic_services
CUSTOM_SELECT_QUERY: SELECT {tableName.fields}, class_access_templates.name as class_access_template_name FROM {tableName} LEFT JOIN class_access_templates ON {tableName}.class_access_template_id=class_access_templates.id
*/
class PeriodicService extends Model {
    
     /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL, NOT_DUPLICATED, ONE_OR_MORE_NAMES
    */
    public $name;

     /** TYPE: VARCHAR(255)
    VALIDATION: ONE_OR_MORE_NAMES
    */
    public $description;    
    
    /** TYPE: DOUBLE
    VALIDATION: REGEX=([0-9]+)(.[0-9]+)? "Enter a value."
    */
    public $price;
    
    /** TYPE: SET('MONTHLY','YEARLY','','') NOT NULL DEFAULT 'MONTHLY'
    */
    public $renewal;
    
    /** 
    TYPE: int(11) NOT NULL 
    */
    public $class_access_template_id;
    
    
    /** 
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $class_access_template_name;
    

    
    
}


?>