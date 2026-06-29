<?php

class Company
{
    public $id;
    public $name;
    public $email;
    public $country_id;
    public $road;
    public $phone;
    public $district_id;
    public $created_at;


    // optional
    public function __construct()
    {
    }

    public function set($name, $email, $country_id, $road, $phone, $district_id){
        $this->name = $name;
        $this->email = $email;
        $this->country_id = $country_id;
        $this->road = $road;
        $this->phone = $phone;
        $this->district_id = $district_id;
    }

    public function createCompany(){
        global $db;
        $sql = "INSERT INTO allcompany (name, email, country_id, road, phone, district_id) VALUES ('$this->name', '$this->email', '$this->country_id', '$this->road', '$this->phone', '$this->district_id')";
        $stmt = $db->query($sql);
        if($stmt){
            return $db->insert_id;
        }
    }

    public static function showCompany(){
        global $db;
        $sql = "SELECT * FROM allcompany";
        $stmt = $db->query($sql);
        if($stmt && $stmt->num_rows>0){
            return array_map(fn($item) => (object)$item, $stmt->fetch_all(MYSQLI_ASSOC));
        }
    }
}
