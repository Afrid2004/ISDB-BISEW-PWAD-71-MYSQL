<?php


class District{
    public static function showDistrict(){
        global $db;
        $stmt = $db->query("SELECT * FROM districts");
        return array_map(fn($item) => (object)$item, $stmt->fetch_all(MYSQLI_ASSOC));
    }
}