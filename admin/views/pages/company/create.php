<?php
$data = Country::showCountry();
$districts = District::showDistrict();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Compnay</title>
</head>

<body>
    <div>
        <div class="bg-white p-4 rounded-3 shadow-sm">
            <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
                <h3>Create Company</h3>
                <a href="<?php echo $base_url . '/company' ?>" class="btn btn-success">All Company</a>
            </div>
            <div>
                <form method="post" action="<?php echo $base_url . '/company/save' ?>">
                    <div class="mb-3">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter company name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
                    </div>
                    <div class="mb-3">
                        <select name="country" class="form-select" id="country">
                            <option value="" selected disabled>Select Country</option>
                            <?php if ($data) {
                                foreach ($data as $value) {
                            ?>
                                <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="road" id="road" class="form-control" placeholder="Enter road" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter phone" required>
                    </div>
                    <div class="mb-3">
                        <select name="district" class="form-select" id="district">
                            <option value="" selected disabled>Select District</option>
                            <?php if ($districts) {
                                foreach ($districts as $value) {
                                    
                            ?>
                                <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <button type="submit" name="btn_submit" class="btn btn-dark w-100">Create Company</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>