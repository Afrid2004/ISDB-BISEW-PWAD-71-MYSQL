<?php

class Country{
    public static function showCountry(){
        global $db;
        $sql = "SELECT * FROM countries";
        $stmt = $db->query($sql);
        if($stmt && $stmt->num_rows>0){
            return array_map(fn($item) => (object)$item, $stmt->fetch_all(MYSQLI_ASSOC));
        }
    }
}