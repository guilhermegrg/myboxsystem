
<!--<?php include_once("../functions.php"); ?>-->

<?php include_once(path() . "/vendor/autoload.php"); ?>

<?php include_once(path() . "/includes/db.php"); ?>

<?php



class DiscountsDAO  {
    
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
        $conn = DiscountsDAO::getConn();
        $stmt = $conn->prepare("DELETE * FROM discounts WHERE id=:id");
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
        }catch(PDOException $e){
            echo "Error deleting!<br>";
            echo $e->getMessage();
        }
           
    }
    
    
    public static function getCount(){
        $conn = DiscountsDAO::getConn();
        $stmt = $conn->query("SELECT COUNT(*) FROM discounts");
        $result = $stmt->fetch();
        //var_dump($result);
        return $result[0];
           
    }
    
    public static function getTotalPages(){
        $count = DiscountsDAO::getCount();
        return ceil($count/DiscountsDAO::$itemsPerPage);
    }
    
    
    
    public static function getList($page){
        
        $conn = DiscountsDAO::getConn();
        
        
        $items = DiscountsDAO::$itemsPerPage;
        $index=($page-1)*$items;
        
//        echo "index: $index <br>";
//        echo "items: $items <br>";
        
        $stmt = $conn->prepare("SELECT * FROM discounts LIMIT :index, :items");
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


DiscountsDAO::getCount();
DiscountsDAO::getTotalPages();
DiscountsDAO::delete(-1);
echo "hello";

?>