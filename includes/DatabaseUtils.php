
<?php include_once("db.php"); ?>

<?php

class DBU {
    
    public static $itemsPerPage = 10;
    
//    
//    CREATE TABLE `discounts` (
//  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//  `name` varchar(100) NOT NULL,
//  `value` varchar(25) NOT NULL,
//  `active` tinyint(1) NOT NULL DEFAULT 0
//) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    
    public static function create($tablename,$fields){
        
        
        $columns = "";
        
        foreach($fields as $name=>$type){
            
            $columns.= "`{$name}` {$type}, ";

        }
        
        $length = strrpos($columns,", ");
        
        
//        echo "Length to cut the last: $length : $columns";
        
        $columns = substr($columns,0,$length);
        
        $query ="CREATE TABLE `{$tablename}` (" . $columns . ")";
//        var_dump($query);
        
        $conn = Database::getConnection();
        $result = $conn->exec($query);
        
    }
    
    public static function drop($tablename){
        $query ="DROP TABLE `{$tablename}` ";
//        var_dump($query);
        
        $conn = Database::getConnection();
        $result = $conn->exec($query);
    }
    
    public static function delete($tablename, $id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM {$tablename} WHERE id=:id");
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $count = $stmt->rowCount();
            
        return $count;
    }
    
    
    public static function insert($tablename, $fields, $sqlExceptions){
        $fieldNameList = "";
        $bindValueNameList = "";
        
        
        
        foreach($fields as $key=>$value){
            if($value === null)
                continue;
            
            $exceptions = $sqlExceptions[$key];
            if($exceptions != null){
                if(in_array("INSERT",$exceptions)){
                    continue;
                }
            }
            
            $fieldNameList.=$key . ", ";
            $bindValueNameList.= ":".$key . ", ";
        }
        
        
        $length = strrpos($fieldNameList,", ");
        $fieldNameList = substr($fieldNameList,0,$length);

        $length2 = strrpos($bindValueNameList,", ");
        $bindValueNameList = substr($bindValueNameList,0,$length2);

        
        
        $conn = Database::getConnection();
    
        $query = "INSERT INTO {$tablename}({$fieldNameList}) VALUES ($bindValueNameList)";
        $stmt = $conn->prepare($query);
        
        
        foreach($fields as $key=>$value){
            if($value === null)
                continue;
            
            $exceptions = $sqlExceptions[$key];
            if($exceptions != null){
                if(in_array("INSERT",$exceptions)){
                    continue;
                }
            }
            
            $stmt->bindValue($key,$value);
        }
        
        $stmt->execute();
        $id = $conn->lastInsertId();
        
        return $id;
    }
    
    
       public static function update($tablename, $fields, $sqlExceptions, $id){
        $valuesList = "";
        
//        $instructions = RU::getSQLCRUDExceptions($this);
//        var_dump($fields);
           
        foreach($fields as $key=>$value){
            if($value === null){
//                echo "Field $key has a null value: $value <br>";
                continue;
            }
            
            $exceptions = $sqlExceptions[$key];
            if($exceptions != null){
                if(in_array("UPDATE",$exceptions)){
                    continue;
                }
            }
            
            $valuesList.=$key . "= :".$key . ", ";
        }
           
           
        $length = strrpos($valuesList,", ");
        $valuesList = substr($valuesList,0,$length);
        
        $conn = Database::getConnection();
    
        $query = "UPDATE {$tablename} SET " . $valuesList  ." WHERE id=:id";
           
           
//        echo "SQL Query: $query<br>";
           
        $stmt = $conn->prepare($query);
        
        
        foreach($fields as $key=>$value){
            if($value === null)
                continue;
            
            $exceptions = $sqlExceptions[$key];
            if($exceptions != null){
                if(in_array("UPDATE",$exceptions)){
                    continue;
                }
            }
            
            $stmt->bindValue($key,$value);
        }
        
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
           
           
        $result = $stmt->execute();
        $rowCount = $stmt->rowCount();
           
//        echo "Row Count: $id<br>";
        
        return $rowCount;
    }
    
    
    
    
       public static function getAssocById($query, $tablename, $id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("{$query} WHERE {$tablename}.id=:id");
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $out = $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
           
    }

      public static function getClassObjectById($query, $tablename, $id, $classname){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("{$query} WHERE {$tablename}.id=:id");
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $out = $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $classname);
        $object = $stmt->fetch();

          echo "<br>";
          var_dump($object);
          echo "<br>";
          
          
        return $object;
           
    }

    
   

    
      
 

    
     public static function getCount($tablename){
        $conn = Database::getConnection();
        $stmt = $conn->query("SELECT COUNT(*) FROM {$tablename}");
        $result = $stmt->fetch();
        //var_dump($result);
        return $result[0];
           
    }
    
    public static function getTotalPages($tablename){
        $conn = Database::getConnection();
        $count = DBU::getCount($tablename);
        return ceil($count/DBU::$itemsPerPage);
    }
    
    
    
//    LEFT JOIN modalities ON modality_classes.modality_id=modalities.id
    
    public static function getPageItemsClassObjects($query,$classname, $page){
        
        $conn = Database::getConnection();
        
        
        $items = DBU::$itemsPerPage;
        $index=($page-1)*$items;
        
//        echo "index: $index <br>";
//        echo "items: $items <br>";
        
        $stmt = $conn->prepare("{$query} LIMIT :index, :items");
//        $stmt->bindValue("itemsPerPage",$items);
//        var_dump($stmt);
//        $stmt->bindValue(':index',0, PDO::PARAM_INT);
//        $stmt->bindValue(':items',10, PDO::PARAM_INT);
        
        $stmt->bindValue(':index',$index, PDO::PARAM_INT);
        $stmt->bindValue(':items',$items, PDO::PARAM_INT);
//        var_dump($stmt);
        
        $result = $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $classname);
        $objectArray = $stmt->fetchAll();
//        var_dump($rows);
        return $objectArray;
    }
    
    public static function getPageItemsAssocArray($query, $page){
        
        $conn = Database::getConnection();
        
        
        $items = DBU::$itemsPerPage;
        $index=($page-1)*$items;
        
//        echo "index: $index <br>";
//        echo "items: $items <br>";
        
        $stmt = $conn->prepare("{$query} LIMIT :index, :items");
//        $stmt->bindValue("itemsPerPage",$items);
//        var_dump($stmt);
//        $stmt->bindValue(':index',0, PDO::PARAM_INT);
//        $stmt->bindValue(':items',10, PDO::PARAM_INT);
        
        $stmt->bindValue(':index',$index, PDO::PARAM_INT);
        $stmt->bindValue(':items',$items, PDO::PARAM_INT);
//        var_dump($stmt);
        
        $result = $stmt->execute();
//        $stmt->setFetchMode(PDO::FETCH_CLASS, $classname);
        $assocArray = $stmt->fetchAll();
//        var_dump($rows);
        return $assocArray;
    }
    
    
       public static function getFirstResultLike($query, $fieldname, $fieldValue){
        $conn = Database::getConnection();
           
        $expression = "{$query} WHERE {$fieldname} LIKE :fieldvalue";
           
//        echo "<br><br>Query Like for duplicates: <br>$expression <br><br> ";
           
        $stmt = $conn->prepare($expression);
        $stmt->bindValue(":fieldvalue",$fieldValue);
        $out = $stmt->execute();
        $result = $stmt->fetch();
//        var_dump($result);
        return $result;
           
    }
    
    
    

    
    public static function isDuplicateField($id, $query, $fieldname, $fieldValue){
        
//        echo "id = $id table: $tablename Field: $fieldname Value: $fieldValue<br>";
        
        
        $result = DBU::getFirstResultLike($query, $fieldname, $fieldValue);
        
        if($result == null || empty($result) || count($result) == 0)
            return false;
        
        $storedID = $result["id"];
        
//        echo "search id: $id, retrieved id: $storedID <br>";
        
        if($id == $storedID)
            return false;
        
        return true;
           
    }
    
    
}


?>