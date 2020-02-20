
<?php include_once("../DatabaseUtils.php"); ?>
<?php include_once("ReflectionUtils.php"); ?>

<?php


class Model {
    
    /** 
    TYPE: int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT

    */
    public $id = 0;
    
    
    public function create(){
       $array =  RU::getPropertiesAndTypesArray($this);
//       var_dump($array);
        
       $tablename = RU::getTableName($this);
//        echo "Table: $tablename<br>";
        DBU::create($tablename,$array);
        
    }
    
    public function delete(){
        $tablename = RU::getTableName($this);
        DBU::delete($tablename,$id);
    }
    
    public function save(){
           if($id<=0){
               create();
           }else{
               update();
           }
    }
    
    
    public function fresh(){
//        return new ;
    }
    
    public function refresh(){
        
    }
    
    
    
    
}



/** 
TABLE: salieri

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
$test->create();




?>