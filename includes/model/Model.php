
<?php include_once("../DatabaseUtils.php"); ?>
<?php include_once("ReflectionUtils.php"); ?>

<?php


class Model {
    
    /** 
    TYPE: int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT
    NOT-USED: INSERT, UPDATE
    */
    public $id = 0;
    
   
    public function create(){
       $array =  RU::getPropertiesAndTypesArray($this);
//       var_dump($array);
        
       $tablename = RU::getTableName($this);
//        echo "Table: $tablename<br>";
        DBU::create($tablename,$array);
        
    }
    
    public function drop(){
//       $array =  RU::getPropertiesAndTypesArray($this);
//       var_dump($array);
        
       $tablename = RU::getTableName($this);
//        echo "Table: $tablename<br>";
        DBU::drop($tablename);
        
    }
    
    public function delete(){
        $tablename = RU::getTableName($this);
        DBU::delete($tablename,$id);
    }
    
  
    
    public function insert(){
        $tablename = RU::getTableName($this);
        $instructions = RU::getSQLCRUDExceptions($this);
        $array =  RU::getPropertiesAndValuesArray($this);
//        $values = $array[0];
//        $types = $array[1];
        DBU::insert($tablename, $array, $instructions);
    }
    
    public function update(){
        $tablename = RU::getTableName($this);
        $instructions = RU::getSQLCRUDExceptions($this);
        $array =  RU::getPropertiesAndValuesArray($this);
//        $values = $array[0];
//        $types = $array[1];
        $id =  DBU::update($tablename, $array, $instructions, $id);
    }
    
    public function save(){
        
        //echo "ID: {$this->id}<br>";
        
           if($this->id<=0){
               $this->insert();
           }else{
               $this->update();
           }
    }
    
    
    public function fresh(){
//        return new ;
    }
    
    public function refresh(){
        
    }
    
    public static function get($id){
        
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



$test = new Test();
//$test->create();
$test->save();

$test->hello = true;
$test->wtf = "Ka lindusss páaaa";

$test->save();




?>