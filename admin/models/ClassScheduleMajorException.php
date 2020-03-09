<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>

<?php

/** 
TABLE:  class_schedule_major_exception
*/
class ClassScheduleMajorException extends Model {

    /** TYPE: DATE
    VALIDATION: NOT_NULL
    */    
	public $date;

    /** TYPE: boolean NOT NULL default false
    */
    public $timeLimited = false;
    
    
    /** TYPE: DATE
    */    
    public $finishDate;
    

    /** TYPE: boolean NOT NULL default false
    */
    public $active = false;

}

?>