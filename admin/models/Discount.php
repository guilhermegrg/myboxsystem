<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  discounts

*/
class Discount extends Model {
    
     /** TYPE: VARCHAR(50) NOT NULL
    VALIDATION: NOT_NULL, NOT_DUPLICATED, SINGLE_NAME
    */
    public $name;
    
    
     /** TYPE: VARCHAR(50) NOT NULL
    VALIDATION: NOT_NULL, REGEX=([0-9]+)(.[0-9]+)?([%]?) "Enter a number or percentage."
    */
    public $value;
    
    /** TYPE: boolean NOT NULL default true
    */
    public $active = true;
    
    
}


?>