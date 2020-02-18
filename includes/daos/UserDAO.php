
<!--<?php include_once("../functions.php"); ?>-->

<?php include_once(path() . "/vendor/autoload.php"); ?>

<?php include_once(path() . "/includes/db.php"); ?>

<?php



class UserDAO  {
    
    public static $itemsPerPage = 10;
    
    public static function getConn(){
        $dotenv = Dotenv\Dotenv::createImmutable(path());
        $dotenv->load();
        
        $dsn = "mysql:host=". $_ENV["DB_HOST"] . ";dbname=". $_ENV["DB_DATABASE"];

        $conn = new PDO($dsn,$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        
        return $conn;
    }
    
    
    public static function delete($id){
        try{
//            echo "before<br>";
        $conn = UserDAO::getConn();
        $stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $count = $stmt->rowCount();
            
//            echo "count: $count<br>";
//            echo "after<br>";
//            var_dump($result);   
//            var_dump($stmt);
        return $count;
            
            
            
        }catch(PDOException $e){
            echo "Error deleting!<br>";
            echo $e->getMessage();
        }
           
    }
     public static function create($name, $value, $active){
        try{
//            echo "before<br>";
        $conn = UserDAO::getConn();
    
    
     $query = "INSERT INTO user(name,value,active) VALUES (:name, :value, :active)";
        $stmt = $conn->prepare($query);
        $stmt->bindValue("name",$name);
        $stmt->bindValue("value",$value);
        $stmt->bindValue("active",$active);
        
        $stmt->execute();
        
        $id = $conn->lastInsertId();
    
          
        }catch(PDOException $e){
            echo "Error DB" . $e->getMessage();
        }
           
    }
    
    
    public static function update($id, $name, $value, $active){
        try{
            echo "active: $active<br>";
        $conn = UserDAO::getConn();
    
    
     $query = "UPDATE users SET name=:name, VALUE=:value, ACTIVE=:active WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue("name",$name);
        $stmt->bindValue("value",$value);
        $stmt->bindValue("active",$active);
        $stmt->bindValue("id",$id);
        
        $result = $stmt->execute();
        
        
        $count = $stmt->rowCount();
            
        return $count;
    
          
        }catch(PDOException $e){
            echo "Error DB" . $e->getMessage();
        }
           
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


UserDAO::getCount();
UserDAO::getTotalPages();
//DiscountsDAO::delete(7);
//echo "hello";
//DiscountsDAO::getById(1);

?>