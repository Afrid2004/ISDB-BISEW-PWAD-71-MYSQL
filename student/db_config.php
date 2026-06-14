<?php 
    // database connection
    try {
        $db = mysqli_connect("localhost", "root", "", "student");
    } catch (\Throwable $th) {
        $th->getMessage();
    }
?>