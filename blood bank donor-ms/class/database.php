<?php


Class Database{

    private $host = "localhost";
    private $password = "";
    private $user = "root";
    private $dbname = "bdmsystem";
    private $conn;

    function SetConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->password);
        }catch(PDOException $e){
            echo $e->getMessage();
            die();
        }

        return $this->conn;
    }

}



?>