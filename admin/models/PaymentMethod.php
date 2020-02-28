<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  payment_methods

*/
class PaymentMethod extends Model {
    
     /** TYPE: VARCHAR(50) NOT NULL
    VALIDATION: NOT_NULL, NOT_DUPLICATED, NAME
    */
    public $name;
    
    
     /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL
    */
    public $instructions;
    
    /** TYPE: boolean NOT NULL default true
    */
    public $active = true;
    
    
}


?>