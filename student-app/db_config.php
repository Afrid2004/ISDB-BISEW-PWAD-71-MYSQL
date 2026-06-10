<?php

// connetcting the school database created at php myadmin
try {
    $db = new mysqli('localhost', "root", "", "school");
    // echo "Conected successfully!";
} catch (\Throwable $th) {
    echo $th->getMessage();
}

//select table and fetch the data from students table using query
$data = $db->query("SELECT * FROM students");
//get data in assosiative array format
$students = $data->fetch_all(MYSQLI_ASSOC);
