<?php
namespace apps\admin;
use mysqli;

class Database extends Control {
    protected $database;
    static protected $instance;

    static public function getInstance(){
        if (!self::$instance) {
            self::$instance= new self();
        }
      return self::$instance;
    }

    public function __construct($user = 'root', $password = '', $db = 'shopping', $host='localhost', $port = 3306){
        $this->database= new mysqli($host, $user, $password, $db, $port);
        if (mysqli_connect_errno()) {
	        die("database connection failed:" .mysqli_connect_error()."(".mysqli_connect_errno().")");
        }else{
            echo "is OK";
        }
    }


    function getconnection(){
       return $this->database;
    }


}

?>