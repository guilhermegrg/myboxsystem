<?php 

include_once("functions.php");

include_once(path() . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(path());
$dotenv->load();


//echo $_ENV["DB_HOST"];


//$dsn = "mysql:host=". $_ENV["DB_HOST"] . ";dbname=". $_ENV["DB_DATABASE"];
//
//$conn = new PDO($dsn,$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);


class Database {
    
    public static $itemsPerPage = 10;
    
    public static function getConnection(){
//        $dotenv = Dotenv\Dotenv::createImmutable(path());
//        $dotenv->load();
        
        $dsn = "mysql:host=". $_ENV["DB_HOST"] . ";dbname=". $_ENV["DB_DATABASE"];

        $conn = new PDO($dsn,$_ENV["DB_USER"],$_ENV["DB_PASSWORD"]);
        
        return $conn;
    }
    
}

?>