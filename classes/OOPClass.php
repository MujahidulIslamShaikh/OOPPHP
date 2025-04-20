<?php

include './config/db.php';

class Students
{
    public $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insert($table_name, $name, $course)
    {
        $checkStmt = $this->conn->prepare("SELECT * FROM $table_name WHERE name = :name");
        $checkStmt->bindParam(':name', $name);
        $checkStmt->execute();
        if ($checkStmt->rowCount() > 0) {
            echo 'Name is already exist, data not insert !';
            return;
        }


        $stmt = $this->conn->prepare("INSERT INTO students (name, course) VALUES (:name, :course)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':course', $course);
        if ($stmt->execute()) {
            echo 'data insert success !';
        } else {
            echo 'not insert data !';
        }
    }

    public function fetchStudData($table_name)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table_name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($table_name, $id)
    {
        $stmt = $this->conn->prepare("DELETE FROM $table_name WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function getData($table_name, $id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table_name WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateData($table_name, $name, $course, $id) {
        $stmt = $this->conn->prepare("UPDATE $table_name SET name = :name, course = :course WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function search($table_name, $term){
        $stmt = $this->conn->prepare("SELECT * FROM $table_name WHERE name LIKE :term");
        // $term = "%term%";
        $stmt->bindParam(':term', $term);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    } 
}

$students = new Students($conn);

echo '<pre>';
// print_r($students->fetchStudData("students"));
// print_r($_POST);
echo '</pre>';
