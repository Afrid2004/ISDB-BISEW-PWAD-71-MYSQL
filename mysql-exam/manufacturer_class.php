<?php

class Manufacturer{
    public $id;
    public $name;
    public $location;

    public function __construct($name, $location)
    {
        $this->name= $name;
        $this->location= $location;
    }

    public function saveData(){
        global $db;
        $sql = "CALL insertManufacturerData('$this->name', '$this->location')";
        $stmt = $db->query($sql);
        if($stmt){
            return header('location:all.php');
        }
        return "Data insertion failed!";
    }

    public static function allData(){
        global $db;
        $sql = "SELECT * FROM allmanufacturer";
        $stmt = $db->query($sql);
        if($stmt && $stmt->num_rows>0){
            $arrayFormat = $stmt->fetch_all(MYSQLI_ASSOC);
            // array map return a callback function and cover array to object 
            $objData = array_map(fn($data) => (object)$data, $arrayFormat);
            return $objData;
        }
        else{
            return null;
        }
    }

    public static function deleteData($id){
        global $db;
        $sql = "DELETE FROM manufacturer WHERE id=$id";
        $stmt = $db->query($sql);
        if($stmt){
            echo "Deleted Successfully!";
            return header("location:all.php");
        }else{
            echo "Failes to Delete data!";
        }

        // DELIMITER $$

        // create TRIGGER delete_product_before_delete_manufacturer
        // BEFORE DELETE ON manufacturer
        // FOR EACH ROW
        // BEGIN
        // 	DELETE FROM product
        //     WHERE manufacturer_id= OLD.id;
        // END $$

        // DELIMITER ;
    }
}