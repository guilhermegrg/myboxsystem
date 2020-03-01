<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  memberships
*/
class Membership extends Model {
    
     /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL, NOT_DUPLICATED, ONE_OR_MORE_NAMES
    */
    public $name;

     /** TYPE: VARCHAR(255)
    VALIDATION: ONE_OR_MORE_NAMES
    */
    public $description;    
    
     /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL, SINGLE_NAME, NOT_DUPLICATED
    */
    public $urlName;
    
    /** TYPE: boolean NOT NULL default true
    */
    public $active = true;

    
    
}


?>