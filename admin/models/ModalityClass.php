<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  modality_classes
CUSTOM_SELECT_QUERY: SELECT {tableName.fields}, modalities.name as modality_name FROM {tableName} LEFT JOIN modalities ON modality_classes.modality_id=modalities.id
*/
class ModalityClass extends Model {
    
     /** TYPE: VARCHAR(50) NOT NULL
    VALIDATION: NOT_NULL, NOT_DUPLICATED, ONE_OR_MORE_NAMES
    */
    public $name;
    
    
     /** TYPE: VARCHAR(255) NOT NULL
    VALIDATION: NOT_NULL, SINGLE_NAME, NOT_DUPLICATED
    */
    public $urlName;
    
    /** TYPE: boolean NOT NULL default true
    */
    public $active = true;
    
    /** TYPE: boolean NOT NULL default true
    */
    public $independentSchedule = true;

    /** TYPE: boolean NOT NULL default false
    */
    public $visibleToUsers = false;
    
    /** TYPE: boolean NOT NULL default true
    */    
    public $publicSchedule = true;
    
    
    
    /** 
    TYPE: int(11)
    */
    public $modality_id;
    
    
        /** 
    NOT-USED: QUERY, INSERT, UPDATE
    */
    public $modality_name;

    
}


?>