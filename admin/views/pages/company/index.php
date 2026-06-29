
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Company</title>
</head>

<body>
    <div>
        <div class="bg-white rounded-3 shadow-sm p-4">
            <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
                <h3>All Company</h3>
                <a href="<?php echo $base_url.'/company/create' ?>" class="btn btn-success">Create New</a>
            </div>
            <table class="table table-striped border mb-0">
                <thead>
                    <tr class="border-0">
                        <th scope="col">#Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Country Id</th>
                        <th scope="col">Road</th>
                        <th scope="col">Phone</th>
                        <th scope="col">District Id</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data) {
                        foreach ($data as $key => $value) {
                            $key++;
                    ?>
                            <tr>
                                <td><?php echo $key; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->country_id; ?></td>
                                <td><?php echo $value->road; ?></td>
                                <td><?php echo $value->phone; ?></td>
                                <td><?php echo $value->district_id; ?></td>
                                <td><?php echo date("h:i:s A", strtotime($value->created_at)); ?></td>
                                <td  class="flex-shrink-0">
                                    <div class="d-flex align-items-center gap-1">
                                        <button class="btn btn-success">Edit</button>
                                        <button class="btn btn-dark">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr><td>No Data Found!</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>