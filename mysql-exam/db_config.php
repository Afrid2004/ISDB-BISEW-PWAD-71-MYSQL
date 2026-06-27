<?php 

try {
    $db = new mysqli("localhost", "root", "", "exam_mysql");
} catch (\Throwable $th) {
    echo $th->getMessage();
}
