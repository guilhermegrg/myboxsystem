<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>

<?php

/** 
TABLE:  class_schedules
CUSTOM_SELECT_QUERY: SELECT {tableName.fields}, modality_classes.name as modality_class_name,  users.name as coach_name FROM {tableName} LEFT JOIN modality_classes ON {tableName}.modality_class_id=modality_classes.id LEFT JOIN users ON {tableName}.coach_id=users.id
*/
class ClassSchedule extends Model {

    /** TYPE: SET('WEEKLY','NONE') NOT NULL DEFAULT 'NONE'
    */
    public $repetition;

    /** TYPE: boolean NOT NULL default false
    */
	public $monday = false;
    
    /** TYPE: boolean NOT NULL default false
    */
	public $tuesday = false;
    
    /** TYPE: boolean NOT NULL default false
    */
	public $wednesday = false;
    
    /** TYPE: boolean NOT NULL default false
    */
	public $thursday = false;

    /** TYPE: boolean NOT NULL default false
    */
    public $friday = false;
    
    /** TYPE: boolean NOT NULL default false
    */
	public $saturday = false;
    
    /** TYPE: boolean NOT NULL default false
    */
	public $sunday = false;


    /** TYPE: DATE
    VALIDATION: NOT_NULL
    */    
	public $startDate;

    /** TYPE: boolean NOT NULL default false
    */
    public $timeLimited = false;
    
    
    /** TYPE: DATE
    */    
    public $finishDate;
    

    /** TYPE: boolean NOT NULL default false
    */
    public $active = false;

    /** 
    TYPE: int(11) NOT NULL
    VALIDATION: NOT_NULL
    */
    public $modality_class_id;
    
    /** 
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $modality_class_name;

    /** 
    TYPE: int(11) NOT NULL 
    VALIDATION: NOT_NULL
    */
    public $coach_id;

    /** 
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $coach_name;

    
    /** TYPE: DOUBLE
    VALIDATION: REGEX=([0-9]+)(.[0-9]+)? "Enter a value."
    */
    public $session_price;

    
    /** TYPE: boolean NOT NULL default true
    */
	public $reservable = true;
    /** TYPE: boolean NOT NULL default true
    */
	public $visibleToUsers = true;
    /** TYPE: boolean NOT NULL default true
    */
	public $billable = true;
    /** TYPE: boolean NOT NULL default true
    */
	public $claimableByCoach = true;

    /** TYPE: boolean NOT NULL default true
    */
	public $limitParticipants = true;
    
    /** 
    TYPE: int(11) NOT NULL default 18
    VALIDATION: NOT_NULL
    */
	public $participantLimit = 18;

    /** 
    TYPE: int(11) NOT NULL default 60
    VALIDATION: NOT_NULL
    */
	public $durationInMinutes = 60;
}

?>