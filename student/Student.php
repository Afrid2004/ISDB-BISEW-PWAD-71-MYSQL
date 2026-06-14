<?php

class Student
{
    public $name;
    public $email;
    public $department;
    public $cgpa;

    public function __construct($sname, $semail, $sdepartment, $scgpa)
    {
        $this->name = $sname;
        $this->email = $semail;
        $this->department = $sdepartment;
        $this->cgpa = $scgpa;
    }

    //create student data
    public function saveData()
    {
        global $db;
        $sql = "INSERT INTO students (name, email, department, cgpa) VALUES ('$this->name', '$this->email', '$this->department', '$this->cgpa')";
        $stmt = $db->query($sql);
        echo "Data inserted successfully!";
    }

    //read student data
    public static function showAll()
    {
        global $db;
        $sql = "SELECT * FROM students";
        $stmt = $db->query($sql);
        $data = $stmt->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    //find data by id
    static public function findData($id)
    {
        global $db;
        $sql = "SELECT * FROM students WHERE id=$id";
        $stmt = $db->query($sql);
        if ($stmt && $stmt->num_rows > 0) {
            $data = $stmt->fetch_object();
            return $data;
        } 
        return null;
    }

    //update student data
    public function updateData($id)
    {
        global $db;
        $sql = "UPDATE students SET name='$this->name', email='$this->email', department='$this->department', cgpa='$this->cgpa' WHERE id=$id";
        $stmt = $db->query($sql);
        if ($stmt) {
            header('location:index.php');
            exit;
        } else {
            echo "Failed to update data.";
        }
    }

    //delete student data
    public static function deleteData($id)
    {
        global $db;
        $sql = "DELETE FROM students WHERE id=$id";
        $stmt = $db->query($sql);
        if (!$stmt) {
            echo "Failed to delete data!";
        }
        return $stmt;
    }
}
