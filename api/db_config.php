<?php


try {
    $db = new mysqli("localhost", "root", "", "batch71");
} catch (\Throwable $th) {
    echo $th->getMessage();
}