
<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/DatabaseUtils.php"); ?>
<?php include_once("ReflectionUtils.php"); ?>
<?php include_once("ValidationUtils.php"); ?>
<?php include_once("ValidationEnforcer.php"); ?>

<?php


class Model {
    
    /** 
    TYPE: int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT
    NOT-USED: INSERT, UPDATE
    */
    public $id = 0;
    
    
    
    public static function getFieldListWithTableName($class){
        $tableName = RU::getTableName($class);
        $fields =  RU::getPropertiesAndTypesArray($class);
        $instructions = RU::getSQLCRUDExceptions($class);
        
        $fieldList = "";
        
        foreach($fields as $key=>$value){
            
            
            $exceptions = $instructions[$key];
            if($exceptions != null){
                if(in_array("QUERY",$exceptions)){
                    continue;
                }
            }
            
            $fieldList .= $tableName.'.'.$key.", ";
        }
        
        $length = strrpos($fieldList,", ");
        $fieldList = substr($fieldList,0,$length);
        
        return $fieldList;
    }
    
    public static function getFilledInCustomSelectQuery($class, $query){
        
        if(strrpos($query,"{tableName.fields}")!== false){
            $fieldList = Model::getFieldListWithTableName($class);
            $query = str_replace("{tableName.fields}",$fieldList,$query );
        }
        
        if(strrpos($query,"{tableName}")!== false){
            $tableName = RU::getTableName($class);
            $query = str_replace("{tableName}",$tableName,$query );
        }
        
        return $query;

    }  
    
    
    public static function getSelectQuery($class){
        $query = RU::getCustomSelectQuery($class);
        if(!$query || empty($query)){
            $tableName = RU::getTableName($class);
            $query = "SELECT * FROM $tableName ";
        }else{
            $query = Model::getFilledInCustomSelectQuery($class, $query);
        }
        
//        echo "<br><br>Query: " . $query. "<br><br>";
        
        return $query;
    }
    
   
    public static function create(){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $instructions = RU::getSQLCRUDExceptions($class);
        
       $array =  RU::getPropertiesAndTypesArray($class);
//       var_dump($array);
//        $class = new ReflectionClass(get_class($this));
        
       $tablename = RU::getTableName($class);
//        echo "Table: $tablename<br>";
        DBU::create($tablename,$array, $instructions);
        
    }
    
    public static function drop(){
        
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        
        
//       $array =  RU::getPropertiesAndTypesArray($this);
//       var_dump($array);
//        $class = new ReflectionClass(get_class($this));
       $tablename = RU::getTableName($class);
//        echo "Table: $tablename<br>";
        DBU::drop($tablename);
        
    }
    
    public static function delete($id){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        
        $tablename = RU::getTableName($class);
        DBU::delete($tablename,$id);
    }
    
    
    public static function get($id){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);

        
//        echo "Calling class: $classname<br>";
//        echo "ID: $id<br>";
//        echo "Table: $tablename<br>";
        $query = Model::getSelectQuery($class);

        
        return DBU::getClassObjectById($query,$tablename, $id, $classname);
    }
 
  
    public static function getCount(){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);

        
        return DBU::getCount($tablename);
    }
    
    public static function getTotalPages(){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);

        
        return DBU::getTotalPages($tablename);
    }
    
    public static function getPageObjects($page){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);
        
        $query = Model::getSelectQuery($class);

        return DBU::getPageItemsClassObjects($query,$classname, $page);
    }
    
    
    public static function getAllObjects(){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);
        
        $query = Model::getSelectQuery($class);

        return DBU::getAllAsClassObjects($query,$classname);
    }
 
    
    public static function getPageAssoc($page){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);
        
        $query = Model::getSelectQuery($class);

        return DBU::getPageItemsAssocArray($query,$page);
    }
    
    
    public static function getFirstResultLike($fieldName, $fieldValue){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);
        
        $query = Model::getSelectQuery($class);
        
        return DBU::getFirstResultLike($query, $tablename .'.'. $fieldName, $fieldValue);
    }
    
    public function getRowLikeField($fieldName){
        $class = new ReflectionClass(get_class($this));
        $tablename = RU::getTableName($class);
        
        $prop = $class->getProperty($fieldName);
        $fieldValue = $prop->getValue($this);
        
        $query = Model::getSelectQuery($class);
        
        return static::getFirstResultLike($query, $tablename.'.'.$fieldName,$fieldValue);
    }
    
    
    public static function isFieldDuplicated($id, $fieldName, $fieldValue){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);
        
        $query = Model::getSelectQuery($class);
        
        return DBU::isDuplicateField($id, $query, $tablename.'.'.$fieldName, $fieldValue);
    }
    
    
    
    public function isFieldValueDuplicated($fieldname){
        $class = new ReflectionClass(get_class($this));

        $prop = $class->getProperty($fieldname);
        $fieldValue = $prop->getValue($this);
        
        return static::isFieldDuplicated($this->id, $fieldname, $fieldValue);
    }
    
    
    
    
    
    public function insert(){
        $class = new ReflectionClass(get_class($this));
        $tablename = RU::getTableName($class);
        $instructions = RU::getSQLCRUDExceptions($class);
        $array =  RU::getPropertiesAndValuesArray($this);
//        $values = $array[0];
//        $types = $array[1];
        $this->id = DBU::insert($tablename, $array, $instructions);
    }
    
    public function update(){
        $class = new ReflectionClass(get_class($this));
        $tablename = RU::getTableName($class);
        $instructions = RU::getSQLCRUDExceptions($class);
        $array =  RU::getPropertiesAndValuesArray($this);
//        $values = $array[0];
//        $types = $array[1];
        DBU::update($tablename, $array, $instructions, $this->id);
    }
    
    public function save(){
        
        //echo "ID: {$this->id}<br>";
        
           if($this->id<=0){
//               echo "INSERT!<br>";
               $this->insert();
           }else{
//               echo "UPDATE!<br>";
               $this->update();
           }
    }
    
    //object or array as parameter
    public function import($object)
    {   
        $vars=is_object($object)?get_object_vars($object):$object;
        if(!is_array($vars)) throw Exception('no props to import into the object!');
        foreach ($vars as $key => $value) {
            $this->$key = $value;
        }
    }  
    
    public function fresh(){
        return static::get($this->id);
    }
    
    public function refresh(){
        $dbObject = static::get($this->id);
        $this->import($dbObject);
    }
    
    
    //validations
    public static function getValidations(){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        return VU::getValidations($class);
    }
     

    public function getValidationRules(){
        $class = new ReflectionClass(get_class($this));
        return VU::getValidations($class);
    }
    
    
    public static function getFieldValidationRule($fieldName){
        $vals = static::getValidations();
        return $vals[$fieldName];
    }
    
    public function getFieldValidation($fieldName){
        $vals = $this->getValidations();
        return $vals[$fieldName];
    }
    
    
    public static function validateObject($object){
        return VE::validate($object);
    }
     

    public function validate(){
         return VE::validate($this);
    }
    
    
    
    public static function getHTMLValidationRule($fieldName){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        return VE::getHTMLValidation($class,$fieldName);
    }
    
    public function getHTMLValidation($fieldName){
        $class = new ReflectionClass(get_class($this));
        return VE::getHTMLValidation($class, $fieldName);
    }
    
}


//
///** 
//TABLE: tests
//
//*/
//class Test extends Model {
//    /** TYPE: VARCHAR(255) NOT NULL
//    VALIDATION: NOT_NULL, NOT_DUPLICATED, LENGTH>2, REGEX=[A-Za-z]{4,} "Name must have two or more names of at least 2 characters each"
//    */
//    var $wtf = "wazzza";
//    
//    /** TYPE: boolean NOT NULL default false
//    */
//    var $hello;
//    
//}



//Test::drop();
//Test::create();

//Test::delete(1);

//$test = Test::get(2);
//var_dump($test);

//$test = new Test();
//$test->save();


//echo "Count: " . Test::getCount() . "<br>";
//echo "Total Pages: " . Test::getTotalPages() . "<br>";
//
//
////$page = Test::getPageObjects(1);
//$page = Test::getPageAssoc(1);
////var_dump($page);
//echo "<br><br><br>";
//
//
//$result = Test::getFirstResultLike("wtf","wazzza");
//var_dump($result);
//
//echo "(static) First repetition of wtf: " . $result['id'] . "<br><br>";
//
//echo "(instance) First repetition of wtf: " . $test->getRowLikeField("wtf")['id'] . "<br><br>";
//
//
//echo "(static) is wtf duplicated: " . Test::isFieldDuplicated(2,"wtf","wazzza") . "<br><br>";
//
//echo "(instance) is wtf duplicated: " . $test->isFieldValueDuplicated("wtf") . "<br><br>";
//$test = new Test();
//$vals = $test->getValidationRules();
//$vals = Test::getValidations();
//echo "<br><pre>";
//var_dump($vals);
//echo "</pre><br>";
//
//$results = $test->validate();
//
//echo "<br><pre>";
//var_dump($results);
//echo "</pre><br>";
//
//

//
//$test->hello = true;
//$test->wtf = "Ka lindusss páaaa";
//
//$test->save();
//
//$first = $test::get(20);
//$copy = $first->fresh();
//
//var_dump($first);
//echo "<br>";
//var_dump($copy);
//echo "<br>";echo "<br>";echo "<br>";
//
//
//$first->wtf = "hello!";
//$first->save();
//
//var_dump($first);
//echo "<br>";
//var_dump($copy);
//echo "<br>";echo "<br>";echo "<br>";
//
//
//$copy->refresh();
//
//var_dump($first);
//echo "<br>";
//var_dump($copy);
//echo "<br>";echo "<br>";echo "<br>";





//$test->wtf = "Ka lindusss páaaa";









?>