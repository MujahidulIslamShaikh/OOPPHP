<?php

include '../config/db.php';

class Admin
{
    private $conn;
    public $table_name = 'admins';
    function __construct($db)
    {
        $this->conn = $db;
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
}

$admin = new Admin($conn);
$data = $admin->login("admin@gmail.com", "admin123");
echo '<pre>';
print_r($data);
echo '</pre>';
