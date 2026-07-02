<?php
include_once("db_config.php");
include_once("Manufacturer.php");
include_once("Product.php");

$manufacturerData = Manufacturer::allManufacturer();
$productData = Product::allProduct();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    Manufacturer::deleteManufacturer($id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>All Data</title>
</head>

<body>
    <div class="bg-light">
        <div class="container">
            <div class=" min-vh-100 d-flex flex-column py-5 align-items-center justify-content-center">
                <div class="bg-white p-4 rounded-4 shadow-sm w-100 mb-3">
                    <div>
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <h1 >All Manufacturer</h1>
                            <a class="btn btn-success" href="create-manufacturer.php">Create Data</a>
                        </div>
                        <div>
                            <table class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($manufacturerData) {
                                        foreach ($manufacturerData as $key => $value) {
                                            $key++;
                                    ?>
                                            <tr>
                                                <th><?php echo $key; ?></th>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->address; ?></td>
                                                <td><?php echo $value->contact_no; ?></td>
                                                <td>
                                                    <a href="all.php?id=<?php echo $value->id ?>" class="btn btn-dark">Delete Manufacturer</a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-4 shadow-sm w-100">
                    <div>
                        <h1 class="mb-3">All Product</h1>
                        <div>
                            <table class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Manufacturer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($productData) {
                                        foreach ($productData as $key => $value) {
                                            $key++;
                                    ?>
                                            <tr>
                                                <th><?php echo $key; ?></th>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->price; ?>TK</td>
                                                <td><?php echo $value->manufacturer_name; ?></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>