<?php

include_once ("db_config.php");

//get all student api create
function getAllStudents(){
    global $db;
    $sql = "SELECT * FROM students LIMIT 20";
    $stmt = $db->query($sql);
    $data = $stmt->fetch_all(MYSQLI_ASSOC);
    return ["students" => $data];
}

// send the data in json format
echo json_encode(getAllStudents());