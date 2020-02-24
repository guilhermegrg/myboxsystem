
<?php include_once("../DatabaseUtils.php"); ?>
<?php include_once("ReflectionUtils.php"); ?>

<?php


class Model {
    
    /** 
    TYPE: int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT
    NOT-USED: INSERT, UPDATE
    */
    public $id = 0;
    
   
    public static function create(){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        
        
       $array =  RU::getPropertiesAndTypesArray($class);
//       var_dump($array);
//        $class = new ReflectionClass(get_class($this));
        
       $tablename = RU::getTableName($class);
//        echo "Table: $tablename<br>";
        DBU::create($tablename,$array);
        
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

        
        return DBU::getClassObjectById($tablename,$id, $classname);
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

        return DBU::getPageItemsClassObjects($tablename,$classname, $page);
    }
    
    
    public static function getPageAssoc($page){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);

        return DBU::getPageItemsAssocArray($tablename,$page);
    }
    
    
    public static function getFirstResultLike($fieldName, $fieldValue){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);
        
        return DBU::getFirstResultLike($tablename, $fieldName, $fieldValue);
    }
    
    public function getRowLikeField($fieldName){
        $class = new ReflectionClass(get_class($this));

        $prop = $class->getProperty($fieldName);
        $fieldValue = $prop->getValue($this);
        
        return static::getFirstResultLike($fieldName,$fieldValue);
    }
    
    
    public static function isFieldDuplicated($id, $fieldname, $fieldValue){
        $classname = get_called_class();
        $class = new ReflectionClass($classname);
        $tablename = RU::getTableName($class);
        
        return DBU::isDuplicateField($id, $tablename, $fieldname, $fieldValue);
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
    
     

    
    
}



/** 
TABLE: tests

*/
class Test extends Model {
    /** TYPE: VARCHAR(255) NOT NULL
    */
    var $wtf = "wazzza";
    
    /** TYPE: boolean NOT NULL default false
    */
    var $hello;
    
}



//Test::drop();
//Test::create();

//Test::delete(1);

//$test = Test::get(1);
//var_dump($test);

$test = new Test();
//$test->save();


echo "Count: " . Test::getCount() . "<br>";
echo "Total Pages: " . Test::getTotalPages() . "<br>";


//$page = Test::getPageObjects(1);
$page = Test::getPageAssoc(1);
//var_dump($page);
echo "<br><br><br>";


$result = Test::getFirstResultLike("wtf","wazzza");
var_dump($result);

echo "(static) First repetition of wtf: " . $result['id'] . "<br><br>";

echo "(instance) First repetition of wtf: " . $test->getRowLikeField("wtf")['id'] . "<br><br>";


echo "(static) is wtf duplicated: " . Test::isFieldDuplicated(2,"wtf","wazzza") . "<br><br>";

echo "(instance) is wtf duplicated: " . $test->isFieldValueDuplicated("wtf") . "<br><br>";



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