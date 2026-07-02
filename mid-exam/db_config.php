<?php

try {
    $db = new mysqli("localhost", "root", "", "myexam");
} catch (\Throwable $th) {
    echo $th->getMessage();
}