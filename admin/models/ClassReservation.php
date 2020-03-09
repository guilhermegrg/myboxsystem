<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>

<?php

/** 
TABLE:  class_reservation
CUSTOM_SELECT_QUERY: SELECT {tableName.fields}, modality_classes.name as modality_class_name,  users.name as $schedule_coach_name, users.name as $claimed_coach_name FROM {tableName} LEFT JOIN modality_classes ON {tableName}.modality_class_id=modality_classes.id LEFT JOIN users ON {tableName}.scheduled_coach_id=users.id LEFT JOIN users ON {tableName}.claimed_coach_id=users.id
*/
class ClassReservation extends Model {



    /** TYPE: DATE
    VALIDATION: NOT_NULL
    */    
	public $date;


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
    public $scheduled_coach_id;

    /** 
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $schedule_coach_name;

    /** 
    TYPE: int(11) NOT NULL 
    VALIDATION: NOT_NULL
    */
    public $claimed_coach_id;

    /** 
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $claimed_coach_name;    
    
    
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