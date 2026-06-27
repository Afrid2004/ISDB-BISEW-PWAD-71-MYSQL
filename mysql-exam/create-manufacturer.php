<?php 
    include_once("db_config.php");
    include_once("manufacturer_class.php");
    if(isset($_POST['btn_submit'])){
        $name = $_POST['name'];
        $location = $_POST['location'];

        $manufacturers = new Manufacturer($name, $location);
        $data = $manufacturers->saveData();

        echo $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div>
        <div class="container">
            <div class="my-5">
                <div class="w-50 mx-auto">
                    <h1 class="mb-3">Manufacturer Data Insert</h1>
                    <form method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Manufacturer name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="location" id="location" placeholder="Manufacturer location" required>
                        </div>
                        <button class="btn btn-success w-100" name="btn_submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>