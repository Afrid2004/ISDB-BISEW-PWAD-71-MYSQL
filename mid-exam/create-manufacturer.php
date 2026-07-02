<?php
include_once("db_config.php");
include_once("Manufacturer.php");
if(isset($_POST['btn_submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $manufacturer = new Manufacturer($name, $address, $contact);
    $data = $manufacturer->save();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Manufacturer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="bg-light">
        <div class="container min-vh-100 d-flex align-items-center justify-content-center">
            <div class="w-100">
                <div class="w-50 mx-auto">
                    <h1 class="mb-3">Insert Manufacturer</h1>
                    <form method="post">
                        <div class="mb-3">
                            <input type="text" value="<?php echo $name ?? "" ?>" class="form-control" id="name" name="name" placeholder="Enter manugfacturer name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" value="<?php echo $address ?? "" ?>" class="form-control" id="address" name="address" placeholder="Enter manugfacturer address" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" value="<?php echo $contact ?? "" ?>" class="form-control" id="contact" name="contact" placeholder="Enter manugfacturer contact" required>
                        </div>

                        <button class="btn btn-success w-100" name="btn_submit" type="submit">Insert Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>