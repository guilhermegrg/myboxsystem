<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/Model.php");?>
<?php


/** 
TABLE:  modality_classes
CUSTOM_SELECT_QUERY: SELECT {tableName.fields}, modalities.name as modality_name FROM {tableName} LEFT JOIN modalities ON {tableName}.modality_id=modalities.id
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
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $modality_name;

    
    public static function getModalityClasses($modality_id){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);
        
        $query = RU::getCustomSelectQuery($class)." WHERE {tableName}.modality_id=:modality_id" ;
        
//        echo "<br>Query:<br>$query</br></br>";
        
        $query = Model::getFilledInCustomSelectQuery($class, $query);
        
//        echo "<br>Query:<br>$query</br></br>";
        
        $conn = Database::getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bindValue(":modality_id",$modality_id,PDO::PARAM_INT);
        $out = $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $classname);
        $result = $stmt->fetchAll();
//     
//        var_dump($result);
        
        return $result;
            
    }
    
}


?>