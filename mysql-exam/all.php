<?php
include_once("db_config.php");
include_once("manufacturer_class.php");
include_once("product_class.php");
$datas = Manufacturer::allData();
$products = Product::allProduct();

// delete manufacturer
if(isset($_GET['id'])){
    $id = $_GET['id'];
    Manufacturer::deleteData($id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>All Data</title>
</head>

<body>

    <div class="bg-light">
        <div class="container">
            <div class="min-vh-100 py-5">
                <div class="bg-white shadow-sm rounded-4 w-100 p-4 mb-5">
                    <div class="d-flex align-items-center justify-content-between mb-3 gap-3">
                        <h3>All Manufacturer</h3>
                        <a class="btn btn-success" href="create-manufacturer.php">Create Manufacturer</a>
                    </div>
                    <table class="table border table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($datas) {
                                foreach ($datas as $key => $data) {
                                    $key++;
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $key; ?></th>
                                        <td><?php echo $data->name; ?></td>
                                        <td><?php echo $data->location; ?></td>
                                        <td>
                                            <div>
                                                <a href="all.php?id=<?php echo $data->id ?>" class="btn btn-dark">Delete Manufacturer</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <p><?php echo "No data found!" ?></p>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="bg-white shadow-sm rounded-4 w-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3 gap-3">
                        <h3>All Products</h3>
                        <a class="btn btn-success" href="create-products.php">Create Products</a>
                    </div>
                    <table class="table border table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Manufacturer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($products) {
                                foreach ($products as $key => $product) {
                                    $key++;
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $key; ?></th>
                                        <td><?php echo $product->name; ?></td>
                                        <td><?php echo $product->price . " TK"; ?></td>
                                        <td><?php echo $product->Manufacturer; ?></td>
                                        <td>
                                            <div>
                                                <a href="delete-manufacturer.php" class="btn btn-dark">Delete Procuct</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <p><?php echo "No data found!" ?></p>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>