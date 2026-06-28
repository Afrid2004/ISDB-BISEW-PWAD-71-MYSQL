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

    public function set($name, $email, $country_id, $road, $phone, $district_id, $created_at){
        $this->name = $name;
        $this->email = $email;
        $this->country_id = $country_id;
        $this->road = $road;
        $this->phone = $phone;
        $this->district_id = $district_id;
        $this->created_at = $created_at;
    }

    public function createCompany(){
        global $db;
        $sql = "INSERT INTO allcompany (id, name, email, country_id, road, phone, district_id, created_at) VALUES ('$this->id', '$this->name', '$this->email', '$this->country_id', '$this->road', '$this->phone', '$this->district_id', '$this->created_at')";
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
