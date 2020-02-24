
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
            if($value == null)
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
            if($value == null)
                continue;
            
            $exceptions = $sqlExceptions[$key];
            if($exceptions != null){
                if(in_array("UPDATE",$exceptions)){
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
        
        $instructions = RU::getSQLCRUDExceptions($this);
        
        foreach($fields as $key=>$value){
            if($value == null)
                continue;
            
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
        $stmt = $conn->prepare($query);
        
        
        foreach($fields as $key=>$value){
            if($value == null)
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
           
           
        $stmt->execute();
        $id = $conn->rowCount();
        
        return $id;
    }
    
    
    
    
       public static function getById($id){
        $conn = UserDAO::getConn();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $out = $stmt->execute();
        $result = $stmt->fetch();
//        var_dump($result);
        return $result;
           
    }
    
      
    public static function duplicateEmail($email){
        $conn = UserDAO::getConn();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email LIKE :email");
        $stmt->bindValue(":email","%".$email."%",PDO::PARAM_STR);
        $out = $stmt->execute();
        $result = $stmt->fetch();
//        var_dump($result);
        return $result;
           
    }
    
    public static function isDuplicateEmail($id, $email){
        $result = UserDAO::duplicateEmail($email);
        
        if($result == null || empty($result) || count($result) == 0)
            return false;
        
        $storedID = $result["id"];
        if($id == $storedID)
            return false;
        
        return true;
           
    }

    
     public static function getCount(){
        $conn = UserDAO::getConn();
        $stmt = $conn->query("SELECT COUNT(*) FROM users");
        $result = $stmt->fetch();
        //var_dump($result);
        return $result[0];
           
    }
    
    public static function getTotalPages(){
        $count = UserDAO::getCount();
        return ceil($count/UserDAO::$itemsPerPage);
    }
    
    
    
    public static function getList($page){
        
        $conn = UserDAO::getConn();
        
        
        $items = UserDAO::$itemsPerPage;
        $index=($page-1)*$items;
        
//        echo "index: $index <br>";
//        echo "items: $items <br>";
        
        $stmt = $conn->prepare("SELECT * FROM users LIMIT :index, :items");
//        $stmt->bindValue("itemsPerPage",$items);
//        var_dump($stmt);
//        $stmt->bindValue(':index',0, PDO::PARAM_INT);
//        $stmt->bindValue(':items',10, PDO::PARAM_INT);
        
        $stmt->bindValue(':index',$index, PDO::PARAM_INT);
        $stmt->bindValue(':items',$items, PDO::PARAM_INT);
//        var_dump($stmt);
        
        $result = $stmt->execute();
        $rows = $stmt->fetchAll();
//        var_dump($rows);
        return $rows;
    }
    
    
}


?>