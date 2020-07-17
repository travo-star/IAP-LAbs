<?php
include "Crud.php";
//include "authenticate.php";
include_once 'DBConnector.php';
abstract class user implements Crud{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;

    private $username;
    private $password;

    function __construct($first_name,$last_name,$city_name, $username, $password){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city_name = $city_name;
        
        $this->username = $username;
        $this->password = $password;
    }

    public static function create() {
        $instance = new self();
        return $instance;
    }

    //username serrer & getter
    public function setUsername($username){
        $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }

    //pass setter n getter
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setUserId($user_id){
        $this->user_id = user_id;
    }

    public function getUserId(){
        return $this->$user_id;
    }

    public function save(){
        $con = new DBConnector;

        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        $res = mysqli_query($con->conn,"INSERT INTO user(first_name,last_name,user_city) VALUES('$fn','$ln','$city')") or die("Error ".mysqli_error($con->conn));
        $con->closeDatabase();
        return $res;
    }
    public static function readAll(){
        $con = new DBConnector;
        $res = mysqli_query($con->conn,"SELECT * FROM user") or die("Error ".mysqli_error($con->conn));
        $con->closeDatabase();
        return $res;
    }
/*
    public function save(){
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        $uname = $this->username;
        $this->hashPassword();
        $pass = $this->password;
        $res = mysql_query("INSERT INTO user(first_name,last_name,user_city,username,password)
            VALUES('$fn','$ln','$city','$uname','$pass')") or die("Error ". mysql_error());
            return $res;
    }*/

    public function readUnique(){
        return null;
    }public function search(){
        return null;
    }public function update(){
        return null;
    }public function removeOne(){
        return null;
    }public function removeAll(){
        return null;
    }

    public function valiteForm(){

        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        if($fn == "" || $ln == "" || $city == ""){
            return false;
        }
        return true;
    }
    public function createFormErroSessions(){
        session_start();
        $_SESSION['form_errors'] = "All fields are required";
    }
    public function hashPassword(){
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
    }
    public function isPasswordCorrect(){
        $con = new DBConnector;
        $found = false;
        $res = mysql_query("SELECT * FROM user") or die ("Error" . mysql_error());
        while($row=mysql_fetch_array($res)) {
            if(password_verify($this->getPassword(),$rrow['password']) && $this->getUsername()==$row['username']){
                $found = true;
            } 
        }
        $con->closeDatabase();
        return $found;
    }
    public function login(){
        if($this->isPasswordCorrect()){
            header("Location:private_page.php");
        }
    }
    public function createUserSession(){
        session_start();
        $_SESSION['username'] = $this->getUsername();
    }
    public function logout(){
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        header("Location:lab1.php");
    }
}


?>