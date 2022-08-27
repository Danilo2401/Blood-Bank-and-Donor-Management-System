<?php

require "../class/database.php";

Class Admin extends Database{

    public $name_admin;
    public $password_admin;

    public function LogIn($name_admin,$password_admin){

        $this->name_admin = $name_admin;
        $this->password_admin = $password_admin;
    
        $select = "SELECT id_admin from bdmsystem.admin where name_admin = :name_admin and password_admin = :password_admin";

        $selectAdmin = parent::SetConnection()->prepare($select);

        $selectAdmin->bindParam(":name_admin",$name_admin);
        $selectAdmin->bindParam(":password_admin",$password_admin);

        $selectAdmin->execute();
    
        if(empty($this->name_admin) || empty($this->password_admin)){
            echo "<h2>Check yout inputs!</h2>";
        }
        else if(!isset($this->name_admin) || !isset($this->password_admin)){
            echo "<h2>Check yout inputs!</h2>";
        }elseif ($this->name_admin != "Admin" || $this->password_admin != "admin10") {
            header("Location:admin.php");
        }else{
            if ($selectAdmin->rowCount() > 0) {
                session_start();
                $_SESSION["name_admin"] = $name_admin;
                $_SESSION["password_admin"] = $password_admin;
                header("Location:admin_panel.php");
            }else{
                header("Location:admin.php");
            }
               
        }

    }
    

}


?>