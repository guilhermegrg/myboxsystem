<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  staff
CUSTOM_SELECT_QUERY: SELECT {tableName.fields}, users.name as user_name FROM {tableName} LEFT JOIN users ON {tableName}.user_id=users.id
*/
class Staff extends Model {
    
    /** 
    TYPE: int(11) NOT NULL 
    VALIDATION: NOT_NULL, NOT_DUPLICATED
    */
    public $user_id;

    /** 
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $user_name;

    
    /** TYPE: DOUBLE
    VALIDATION: REGEX=([0-9]+)(.[0-9]+)? "Enter a numeric value."
    */
    public $session_price;
    
    
}


?>