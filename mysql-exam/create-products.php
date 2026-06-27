<?php 
    include_once("db_config.php");
    include_once("product_class.php");
    include_once("manufacturer_class.php");
    $manufacturers = Manufacturer::allData();

    if(isset($_POST['btn_submit'])){
        $name = trim($_POST['name']);
        $price = intval($_POST['price']);
        $manufacturerId = intval($_POST['manufacturerid']);
        $product = new Product($name, $price, $manufacturerId);
        $product->saveProduct();
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
                    <h1 class="mb-3">Product Data Insert</h1>
                    <form method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Product name" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="price" id="price" placeholder="Product price" required>
                        </div>
                        <div class="mb-3">
                            <select name="manufacturerid" id="manufacturerid" class="form-select" required>
                                <option value="" selected disabled>Select Manufacturer</option>
                                <?php if($manufacturers) {
                                    foreach ($manufacturers as $manufacturer) {
                                ?>
                                    <option value="<?php echo $manufacturer->id; ?>"><?php echo $manufacturer->name; ?></option>
                                <?php } }?>
                            </select>
                        </div>
                        <button class="btn btn-success w-100" name="btn_submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>