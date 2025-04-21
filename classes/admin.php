<?php

// include './config/db.php';
// include '../config/db.php';

class Admin
{
    private $conn;
    public $table_name = 'admins';
    function __construct($db)
    {
        $this->conn = $db;
    }

    public function addAdmin($email, $pass){
        $stmtcheck = $this->conn->prepare("SELECT * FROM admins where email = :email");
        $stmtcheck->bindParam(':email', $email);
        $stmtcheck->execute();
        $data = $stmtcheck->fetch(PDO::FETCH_ASSOC);
        if($data){
            return 'this email already exist !';
            exit;
        } 


       $stmt = $this->conn->prepare("insert into admins (email, pass) values (:email, :pass)");
       $stmt->bindParam(':email', $email);
       $stmt->bindParam(':pass', $pass);
       return $stmt->execute();
        
    }
    public function login($email, $pass)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name .
            " WHERE email = :email AND pass = :pass");
        $stmt->execute([
            ':email' => $email,
            ':pass' => md5($pass)
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getallAdmins() {
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->table_name);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id) {

    }
    
   
}

$admin = new Admin($conn);
