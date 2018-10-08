
<?php

/**
 * Copyright (c)  created by @wmartz
 */

class BCMysql extends PDO
{

//Properties Dedfinition
  private $host;
  private $bdname;
  private $user;
  private $pass;
  private $dsn;




  function __construct($_dbname,$_host,$_user,$_pass)
  {
    $this->setHost($_host);
    $this->setUser($_user);
    $this->setPass($_pass);
    $this->setDBName($_dbname);
    $this->dsn = 'mysql:dbname='.$this->bdname.';host='.$this->host;
  }

//setters and getters
  function getDSN(){
      return $this->dsn;
  }
    function  setDBName($_bdname){
    $this->bdname=$_bdname;

  }
  function getDBName()
    {
        return $this->bdname;
    }
  function getHost()
  {
    return $this->host;
  }
  function  setHost($_host){
    $this->host = $_host;

  }
  function setUser($_user){
    $this->user=$_user;
  }
  function getUser()
    {
        return $this::user;
    }

  function setPass($_pass){
      $this->pass=$_pass;
  }
  function getPass()
  {
      return $this::pass;

  }

// Test the conection an return a value true if the conection works
  function testConnection(){

    try {

      if($this->host==null){
          echo"host it's empty ";
      }
      elseif ($this->getDBName()==null) {
        echo"Data Base Name it's empty ";
      }
      elseif ($this->user == null) {
          echo"User Name it's empty ";
      }
      else {

          $pdo = new PDO($this->dsn, $this->user, $this->pass);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return true;
      }
    } catch (Exception $e) {

      echo$e;

    }
  }

  //This Method Create a new DataBase

  function createDB($_dbname)
    {

        $this->setDBName($_dbname);
        try {

            $pdo = new PDO($this->dsn,$this->user,$this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $rquest = 'CREATE DATABASE IF NOT EXISTS '.$this->getDBName().' COLLATE utf8_spanish_ci' ;
            $pdo->query($rquest);
        } catch (Exception $e) {

            echo $e;

        }
    }

   function requestDB($request){


       try {

           $pdo = new PDO($this->dsn,$this->user,$this->pass);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           return $pdo->query($request);
       } catch (Exception $e) {

           echo $e;

       }
   }

}
