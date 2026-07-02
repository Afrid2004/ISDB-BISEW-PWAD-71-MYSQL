<?php

class Product{
    
    public $id;
    public $name;
    public $price;
    public $manufacturer_id;

    public static function allProduct(){
        global $db;
        $sql = "SELECT * FROM allproduct";
        $stmt = $db->query($sql);
        if($stmt && $stmt->num_rows>0){
            return array_map(fn($item) => (object)$item, $stmt->fetch_all(MYSQLI_ASSOC));
        }
        return null;
    }

}