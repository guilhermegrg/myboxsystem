
<?php include_once("db.php"); ?>

<?php

class DBU {
    
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
        
        
        echo "Length to cut the last: $length : $columns";
        
        $columns = substr($columns,0,$length);
        
        $query ="CREATE TABLE `{$tablename}` (" . $columns . ")";
        var_dump($query);
        
        $conn = Database::getConnection();
        $result = $conn->exec($query);
        
    }
    
    public static function drop($tablename){
        
    }
    
    public static function delete($tablename, $id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM {$tablename} WHERE id=:id");
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $count = $stmt->rowCount();
            
        return $count;
    }
    
    
    public static function insert($tablename, $fields){
        $fieldNameList = "";
        $bindValueNameList = "";
        
        foreach($fields as $key=>$value){
            if($value == null)
                continue;
            
            $fieldNameList.=$key . ", ";
            $bindValueNameList.= ":".$key . ", ";
        }
        
        $conn = Database::getConnection();
    
        $query = "INSERT INTO {$tablename}({$fieldNameList}) VALUES ($bindValueNameList)";
        $stmt = $conn->prepare($query);
        
        
        foreach($fields as $key=>$value){
            if($value == null)
                continue;
            $stmt->bindValue($key,$value);
        }
        
        $stmt->execute();
        $id = $conn->lastInsertId();
        
        return $id;
    }
    
}


?>