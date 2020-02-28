<?php



class RU{
    
    
        
    public static function getCustomSelectQuery($class){
        $comment = $class->getDocComment();
//        var_dump($comment);
        return RU::getDocField("CUSTOM_SELECT_QUERY:", $comment);
    }    

        
    
    public static function getClassTableName($class){
        $comment = $class->getDocComment();
//        var_dump($comment);
        return RU::getDocField("TABLE:", $comment);
    }    
    
    public static function getTableName($class){
        $tableName = RU::getClassTableName($class);
        if($tableName == null){
            $class_name = strtolower($class->getName());
            return $class_name;
        }
        
        return $tableName;
    }
    
//    public static function getProperties($class){
////        $class_name = get_class($object);
////        $rc = new ReflectionClass($class_name);
//        $props = $class->getProperties();
//        /*var_dump($props);*/
//        return $props;
//    }
//    
    public static function getDocField($tag, $comment){

        $index = strpos($comment,$tag);
        if($index<=2)
            return null;
        
        $index = $index+strlen($tag);
        $comment = substr($comment,$index); //start on the new position
        $length = strpos($comment,PHP_EOL); //get the position of the first new line after the tag

//        echo "Length: $length <br>";
//        echo "Comment: $comment<br>";
        
        $type = substr($comment,0,$length);
//        echo "Type: $type<br>";
//        var_dump($type);
        return trim($type);
    }
    
    public static function getSQLCRUDExceptions($class){
        $instructions = [];
        $count = 0;
        
        $props = $class->getProperties();
        
        foreach($props as $prop){
            
            $key = $prop->getName();
            
            $array = RU::getSQLCRUDInstructions($prop);
            
            $instructions[$key] = $array;
            
            ++$count;
        }
        
        return $instructions;
        
    }
    
    public static function getSQLCRUDInstructions($prop){
        $comment = $prop->getDocComment();
        $methods =  RU::getDocField("NOT-USED:",$comment);
        
        if($methods==null)
            return null;
        
        $array = explode(', ', $methods);
        
        return $array;
    }
    
    
    public static function getType($prop){
        $comment = $prop->getDocComment();
        $type =  RU::getDocField("TYPE:",$comment);
        
        if($type==null)
            return "VARCHAR(255)";
        
        return $type;
    }
    
    
    public static function getPropertiesValuesAndTypesArray($object){
        $values = [];
        $types = [];
        $count = 0;
        
        $class = new ReflectionClass(get_class($object));
        $props = $class->getProperties();
        
        foreach($props as $prop){
            $type = RU::getType($prop);
            
            $key = $prop->getName();
            $value = $prop->getValue($object);
            
            $values[$key] = $value;
            $types[$key] = $type;
            
            ++$count;
        }
        
        return [$values,$types];
    }
    
     public static function getPropertiesAndTypesArray($class){
        $types = [];
        $count = 0;
        
//        $class = new ReflectionClass(get_class($object));
        $props = $class->getProperties();

        foreach($props as $prop){
            $type = RU::getType($prop);
            
            $key = $prop->getName();
            $types[$key] = $type;
            
            ++$count;
        }
        
        return $types;
    }
    
    
    public static function getPropertiesAndValuesArray($object){
        $array = [];
        $count = 0;
        
        $class = new ReflectionClass(get_class($object));
        $props = $class->getProperties();

        foreach($props as $prop){
            $prop->getDocComment();
            $key = $prop->getName();
            $value = $prop->getValue($object);
            $array[$key] = $value;
            ++$count;
        }
        
        return $array;
    }
    
}

//RU::getTableName(new RU());

?>