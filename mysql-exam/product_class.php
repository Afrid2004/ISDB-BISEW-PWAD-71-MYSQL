<?php


class Product{
    public $id;
    public $name;
    public $price;
    public $manufacturer_id;

    public function __construct($pname, $pprice, $pmanufacturerid)
    {
        $this->name = $pname;
        $this->price = $pprice;
        $this->manufacturer_id = $pmanufacturerid;
    }

    public function saveProduct(){
        global $db;
        $sql = "CALL insertProductData('$this->name', '$this->price', '$this->manufacturer_id')";
        $stmt = $db->query($sql);
        if($stmt){
            return header("location:all.php");
        }else{
            echo "Fail to insert poduct";
        }
    }

    public static function allProduct(){
        global $db;
        $sql = "SELECT * FROM allproduct";
        $stmt = $db->query($sql);
        if($stmt && $stmt->num_rows>0){
            $arrayFormat = $stmt->fetch_all(MYSQLI_ASSOC);
            return array_map(fn($data) => (object) $data, $arrayFormat);
        }
        else{
            return null;
        }

        // create view allproduct as 
        // SELECT p.id, p.name, p.price, manufacturer.name as Manufacturer 
        // FROM product p JOIN manufacturer 
        // ON p.manufacturer_id=manufacturer.id;
    }

}