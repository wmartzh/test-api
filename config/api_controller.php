<?php
/**
 * Created by PhpStorm.
 * User: William
 * Date: 10/8/2018
 * Time: 10:33 AM
 */require_once 'database.php';
 include_once 'model.php';
class Api_Controller{

    private $connection;
    private $obj;

    public function __construct(){

    }

    public function  read_api(){
        //headers
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        //db obj
        $this->connection = ;
        $this->obj = new Model($this->connection);
        $res = $this->obj->read();
        $count = $res->rowCount();
        if($count>0){
            $obj_array = array();
            $obj_array['obj']=array();
            while ($r = $res->fetch(PDO::FETCH_ASSOC)){
                extract($r);
                $obj_item = array(
                    "id" => $this->obj->getId(),
                    "name"=> $this->obj->getName(),
                    "description"=> html_entity_decode($this->obj->getDescription()),
                    "price"=>$this->obj->getPrice(),
                    "category_id" => $this->obj->getCategoryId(),
                    "category_name" =>$this->obj->getCategoryName()
                );
                array_push($obj_array['obj'],$obj_item);
            }
            echo json_decode($obj_array);
        }else{
            echo json_encode(array("Message"=>"empty"));
        }

    }


}