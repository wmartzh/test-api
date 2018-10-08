<?php
/**
 * Created by PhpStorm.
 * User: William
 * Date: 10/8/2018
 * Time: 10:25 AM
 */
// DB Config
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'restapi');

class Database extends PDO {
    var $connection;

    public function getConnection(){
        $this->connection = null;
        try{
            $this->connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);
            $this->connection->exec("set name utf8");

        }catch (PDOException $exception){
            echo"something was wrong".$exception->getMessage();
        }
        return $this->connection;
    }
}
