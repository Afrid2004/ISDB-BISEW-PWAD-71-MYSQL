<?php

class Manufacturer{
    public $id;
    public $name;
    public $address;
    public $contact;

    public function __construct($name, $address, $contact)
    {
        $this->name = $name;
        $this->address = $address;
        $this->contact = $contact;
    }

    public function save(){
        global $db;
        $sql = "CALL insertIntoManufacturer('$this->name', '$this->address', '$this->contact')";
        $stmt = $db->query($sql);
        if($stmt){
            echo "Data inserted successfully!";
            header("location:all.php");
        }
        else echo "Failed to insert data!";
    }

    public static function allManufacturer(){
        global $db;
        $sql = "SELECT * FROM manufacturer";
        $stmt = $db->query($sql);
        if($stmt && $stmt->num_rows>0){
            return array_map(fn($item) => (object)$item, $stmt->fetch_all(MYSQLI_ASSOC));
        }
        return null;
    }

    public static function deleteManufacturer($id){
        global $db;
        $sql = "DELETE FROM manufacturer WHERE id = $id";
        $stmt = $db->query($sql);
        header("location:all.php");
        return $stmt;
    }
}