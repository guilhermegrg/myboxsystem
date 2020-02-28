<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE: users

*/
class User extends Model {
    
    /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL
    */
    public $name;

    /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL, EMAIL, NOT_DUPLICATED
    */
    public $email;
    
    
    /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: PASSWORD
    */
    public $password;
    
    /** TYPE: VARCHAR(15) NOT NULL
    VALIDATION: NOT_NULL, REGEX=[0-9]{9,} "Enter a valid mobile phone number please!"
    */
    public $mobile;
    
    /** TYPE: DATE
    VALIDATION: NOT_NULL
    */
    public $birthday;
    
    /** TYPE: boolean NOT NULL default true
    */
    public $active = true;
    
}




?>