<?php
namespace apps\admin;

class Control {
    public $post;
    public $admin;
    public $comments;
    static public $time;
    static public $name;
    static public $price;

    static public function get_time(){
        return self::$time="bonjour";
    }

    public function  __construct($a,$b,$c,$d,$e){
         $this->post = $a;
         $this->admin = $b;
         $this->comments = $c;
         self::$name = $d;
         self::$price = $e;
         
    }

    function display(){
        $output='';
        $output.= $this->post;
        $output.= "<br>";
        $output.= $this->admin;
        $output.= "<br>";
        $output.= $this->comments;
        return $output;
    }

     static public function query(){
        $database= Database::getInstance(); 
        $mysqli=$database->getconnection();
        $na=$mysqli->real_escape_string(self::$name);
        $pr=$mysqli->real_escape_string(self::$price);
        $sql=$mysqli->query("SELECT * FROM shopping_cart WHERE name='$na'");
        $row=$sql->fetch_array();
        $output="";
        $output.="<br>";
        $output.=$row['name'];
        $output.="<br>";
        $output.=$row['price'];
        return $output;
    } 
}
?>